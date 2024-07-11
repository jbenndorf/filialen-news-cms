<?php

namespace App\Http\Controllers;

use App\Models\Filiale;
use Inertia\Inertia;

class FilialenController extends Controller
{
    public function index()
    {
        $filialen = Filiale::all();

        return Inertia::render('Filiale/Index', [
            'filialen' => $filialen
        ]);
    }

    public function show($filiale)
    {
        $filiale = strtoupper($filiale);

        $filiale = Filiale::where('name', $filiale)->first();

        return Inertia::render('Filiale/Show', [
            'filiale' => $filiale
        ]);
    }
}
