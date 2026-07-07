<?php

namespace App\Http\Controllers;
use App\Models\Abonnementtype;
use Illuminate\Http\Request;

class AbonnementController extends Controller
{
    public function showAbonnementen()
    {
        return view('abonnement.abonnement');
    }

    public function showAbonnement()
    {

        $abonnement = Abonnementtype::all();
        return view('abonnement.abonnement', compact('abonnement'));
    }

    public function showAbonnementForm(){

    return view('abonnement.abonnementForm');
    }



    public function store(Request $request)
{
    $validated = $request->validate([
        'naam' => 'required|string|max:255',
        'beschrijving' => 'required|string',
        'prijs' => 'required|numeric',
    ]);

    $abonnement = Abonnementtype::create($validated);

    dd($abonnement);
}

}



