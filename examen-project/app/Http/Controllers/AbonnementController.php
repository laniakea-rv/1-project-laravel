<?php

namespace App\Http\Controllers;
use App\Models\Abonnementtype;
use App\Models\Abonnement;
use Illuminate\Http\Request;
use App\Models\User;

class AbonnementController extends Controller
{
    public function showAbonnementen()
    {
        $abonnementen = Abonnementtype::all();
        $user = request()->user();
        $huidigAbonnement = $user->abonnementen()->where('actief', true)->first();
        return view('abonnement.abonnement', compact('abonnementen', 'huidigAbonnement'));
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
        $user = request()->user();

        $heeftActiefAbonnement = $user->abonnementen()
            ->where('actief', true)
            ->exists();
        if ($heeftActiefAbonnement) {
            return back()->with('error', 'je hebt al een abonnement');
        }

        $validated = $request->validate([
            'id' => 'required|exists:abonnementtypes,id',
        ]);

        $user->abonnementen()->create([
            'start_datum' => now(),
            'eind_datum' => null,
            'actief' => true,
            'abonnementtype_id' => $validated['id'],
        ]);
        return back();
    }

    public function opzeggenUserAbonnement(Request $request)
    {
        $user = request()->user();
        $abonnement = $user->abonnementen()->where('actief', true)->first();

        if ($abonnement->user_id !== $user->id) {
            return back()->with('error', 'dit is NIET jouw abonnement, niet hacken op onze website ik ZIE je wel');
        }

        if ($abonnement) {
            $abonnement->update([
                'eind_datum' => now(),
                'actief' => false,
            ]);
        }

        return back();
    }
}