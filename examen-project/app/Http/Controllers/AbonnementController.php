<?php

namespace App\Http\Controllers;
use App\Models\Abonnementtype;
use App\Models\Abonnement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AbonnementController extends Controller
{
    public function showAbonnementen()
    {
        $abonnement = Abonnementtype::all();
        return view('abonnement.abonnement', compact('abonnement'));
    }

    public function showUserAbonnement()
    {
        $userId = Auth::user()->id;
        $user = Abonnement::where('id', $userId)->get();
        return view('userDisplay', compact('user'));
    }

    public function showAbonnementForm()
    {
        return view('abonnement.abonnementForm');
    }

    public function storeAbonnement(Request $request)
    {
        $validated = $request->validate([
            'naam' => 'required|string|max:255',
            'beschrijving' => 'required|string',
            'prijs' => 'required|numeric',
        ]);

        $abonnement = Abonnementtype::create($validated);
        return redirect()->route('abonnementen');
    }

    public function storeUserAbonnement(Request $request)
    {   
        
        $validated = $request->validate([
            'id' => 'required|exists:abonnementtypes,id',
        ]);
        $user = request()->user();

        $user->abonnementen()->create([
            'start_datum' => now(),
            'eind_datum' => null,
            'actief' => true,
            'abonnementtype_id' => $validated['id'],
        ]);
        return redirect()->route('abonnementen');
    }
}