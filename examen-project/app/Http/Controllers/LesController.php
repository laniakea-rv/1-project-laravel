<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Les;
use Illuminate\Support\Facades\Auth;
use App\Models\Voortgang;

class LesController extends Controller
{
    public function index()
    {
        $lessen = Les::with([
            'voortgangen' => function ($query) {
                $query->where('user_id', auth()->id());
            }
        ])->get();

        $laatsteVoortgang = Voortgang::where('user_id', auth()->id())
            ->latest('updated_at')
            ->first();

        foreach ($lessen as $les) {
            $voortgang = $les->voortgangen->first();

            if (!$voortgang) {
                $les->klasse = 'niet-gestart';
                $les->statusTekst = 'Nog niet gestart';
            } elseif ($voortgang->status === 'bezig') {
                $les->klasse = 'bezig';
                $les->statusTekst = 'Bezig';
            } else {
                $les->klasse = 'afgerond';
                $les->statusTekst = 'Afgerond';
            }

            $les->laatstBekeken = $laatsteVoortgang && $les->id == $laatsteVoortgang->les_id;
        }

        $lessen = $lessen->sortByDesc('laatstBekeken')->values();

        return view('lessen.lesindex', compact('lessen', 'laatsteVoortgang'));
    }

    public function show(Les $les)
    {
        $voortgang = Voortgang::firstOrCreate(
            [
                'user_id' => Auth::id(),
                'les_id' => $les->id,
            ],
            [
                'status' => 'bezig'
            ]
        );

        $voortgang->touch();

        return view('lessen.showles', compact('les'));
    }

    public function afronden(Les $les)
    {
        $voortgang = Voortgang::where('user_id', auth()->id())
            ->where('les_id', $les->id)
            ->first();

        if ($voortgang) {
            $voortgang->status = 'afgerond';
            $voortgang->save();
        }

        return redirect()->back();
    }


}