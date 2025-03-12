<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveDepartementRequest;
use App\Models\Departement;
use Exception;
use Illuminate\Http\Request;

class DepartementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departements = Departement::paginate(10);
        return view('departements.index', compact('departements'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('departements.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Departement $departement ,SaveDepartementRequest $request)
    {
        try {
            // dd($request);

        // $newDepartement = new Departement();
        $departement->name = $request->name;
        $departement->save();

        return redirect()->route('departement.index')->with('success_message', 'Département enregistré!');
        } catch (Exception $e) {
            dd($e);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Departement $departement)
    {
        return view('departements.edit', compact('departement'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Departement $departement ,SaveDepartementRequest $request)
    {
        try {
        $departement->name = $request->name;
        $departement->update();

        return redirect()->route('departement.index')->with('success_message', 'Département modifié avec succes!');
        } catch (Exception $e) {
            dd($e);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Departement $departement)
    {
        try {
        $departement->delete();

        return redirect()->route('departement.index')->with('success_message', 'Département Supprimé!');
        } catch (Exception $e) {
            dd($e);
        }
    }
}
