<?php

namespace App\Http\Controllers;
use App\Models\Abonnementtype;
use App\Models\Abonnement;
use Illuminate\Http\Request;

class AbonnementController extends Controller
{
    public function showAbonnementen()
    {
        $abonnement = Abonnementtype::all();
        return view('abonnement.abonnement', compact('abonnement'));
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
            'start_datum' => 'required|datetime',
            'eind_datum' => 'nullable|datetime',
            'active' => 'required|boolean',
            'abonnementtype_id' => 'required|exists:abonnementtypes,id',
        ]);
        $user = auth()->user();

        $user->abonnementen()->create([
            'start_datum' => $validated['start_datum'],
            'eind_datum' => $validated['eind_datum'] ?? null,
            'active' => $validated['active'],
            'abonnementtype_id' => $validated['abonnementtype_id'],
        ]);
        return redirect()->route('abonnementen');
    }
}