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

    public function show($filialeId)
    {
        $filiale = Filiale::findOrFail($filialeId);

        return Inertia::render('Filiale/Show', [
            'filiale' => $filiale
        ]);
    }
}
