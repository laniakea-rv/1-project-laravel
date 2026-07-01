<?php

namespace App\Http\Controllers;

use App\Models\Abonnementtype;
use Illuminate\Http\Request;

class AbonnementController extends Controller
{
    public function showAbonnementen(){
        return view('abonnement');
    }

public function showAbonnement()
    {

        $abonnement = Abonnementtype::all();
        return view('abonnement', compact('abonnement'));
    }
}





