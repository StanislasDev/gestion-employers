<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEmployerRequest;
use App\Models\Departement;
use App\Models\Employer;
use Exception;
use Illuminate\Http\Request;

class EmployerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employers = Employer::with('departement')->paginate(10);
        return view('employers.index', compact('employers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departements = Departement::all();
        return view('employers.create', compact('departements'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEmployerRequest $request)
    {

        try {
            
        // dd($request);
        Employer::create($request->all());

        return redirect()->route('employer.index')->with('success_message', 'Employer créer avec succès!');
        } catch (Exception $e) {
            dd($e);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employer $employer)
    {
        // dd($employer);
        $departements = Departement::all();
        return view('employers.edit', compact('employer','departements'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employer $employer)
    {
        $request->validate([
            'departement_id' => 'required|integer',
            'nom' => 'required|string',
            'prenaom' => 'required|string',
            'email' => 'required|email',
            'contact' => 'required|numeric|min:9',
            'montant_journalier' => 'required|min:3'
        ]);
        try {
        $employer->update($request->all());

        return redirect()->route('employer.index')->with('success_message', 'Employer correctement modifié!');
        } catch (Exception $e) {
            dd($e);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employer $employer)
    {
        try {
            $employer->delete();
    
            return redirect()->route('employer.index')->with('success_message', 'Employer Supprimé!');
            } catch (Exception $e) {
                dd($e);
            }
    }
}
