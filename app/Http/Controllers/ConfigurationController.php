<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreConfigRequest;
use App\Models\Configuration;
use Exception;
use Illuminate\Http\Request;

class ConfigurationController extends Controller
{
    public function index()
    {
        $allConfigurations = Configuration::latest()->paginate(10);
        return view('config.index', compact('allConfigurations'));
    }

    public function create()
    {
        return view('config.create');
    }

    public function store(StoreConfigRequest $request)
    {
        try {
            Configuration::create($request->all());
            return redirect()->route('configuration')->with('success', 'Configuration bien enregistrée!');
        } catch (Exception $e) {
            dd($e);
            throw new Exception('Erreur lors de l\'enregistrement de la configuration');
        }
    }

    public function delete(Configuration $configuration)
    {
        try {
            $configuration->delete();

            return redirect()->route('configuration')->with('success', 'Configuration correctement retirée!');
        } catch (Exception $e) {
            throw new Exception('Erreur de suppression de la configuration!');
        }
    }
}
