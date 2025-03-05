<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Employer;
use App\Models\Departement;
use Illuminate\Http\Request;

class AppController extends Controller
{
    public function index()
    {
        $totalDepatements = Departement::all()->count();
        $totalEmployers = Employer::all()->count();
        $totalUsers = User::all()->count();

        return view('dashboard', compact('totalDepatements', 'totalEmployers', 'totalUsers'));
    }
}
