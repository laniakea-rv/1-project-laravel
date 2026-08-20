<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Les;
use Illuminate\Support\Facades\Auth;
use App\Models\Voortgang;
use App\Models\AbonnementType;
use App\Models\Video;

class LesController extends Controller
{
    public function index()
    {
        $search = request('search');
        $kiesOnderwerp = request('onderwerp');
        $lessen = $this->getLessen($kiesOnderwerp, $search);
        $progressie = $this->getProgressie();
        $lessen = $this->progressie($lessen, $progressie);
        $onderwerp = $this->getOnderwerp();

        return view('lessen.lesindex', compact(
            'lessen',
            'progressie',
            'onderwerp',
            'kiesOnderwerp',
            'search'
        ));
    }

    private function getLessen($kiesOnderwerp, $search)
    {
        $query = Les::with([
            'voortgangen' => function ($query) {
                $query->where('user_id', auth()->id());
            }
        ]);

        $user = Auth::user();

        $abonnement = $user->abonnementen()
            ->where('actief', true)
            ->first();

        if (!$abonnement) {
            return collect();
        }

        $query->where('abonnement_type_id', $abonnement->abonnementtype_id);

        if ($kiesOnderwerp) {
            $query->where('onderwerp', $kiesOnderwerp);
        }

        if ($search) {
            $query->where('naam', 'like', '%' . $search . '%');
        }

        return $query->get();
    }
    private function getProgressie()
    {
        return Voortgang::where('user_id', auth()->id())
            ->latest('updated_at')
            ->first();
    }

    private function progressie($lessen, $progressie)
    {
        foreach ($lessen as $les) {
            $progress = $les->voortgangen->first();

            if (!$progress) {
                $les->klasse = 'niet-gestart';
                $les->statusTekst = 'Nog niet gestart';
            } elseif ($progress->status === 'bezig') {
                $les->klasse = 'bezig';
                $les->statusTekst = 'Bezig';
            } else {
                $les->klasse = 'afgerond';
                $les->statusTekst = 'Afgerond';
            }

            $les->lastViewed = $progressie && $les->id == $progressie->les_id;
        }

        return $lessen->sortByDesc('lastViewed')->values();
    }

    private function getOnderwerp()
    {
        return Les::select('onderwerp')
            ->distinct()
            ->orderBy('onderwerp')
            ->pluck('onderwerp');
    }

    public function show(Les $les)
    {
        $user = Auth::user();

        $abonnement = $user->abonnementen()
            ->where('actief', true)
            ->first();

        if (!$abonnement || $les->abonnement_type_id != $abonnement->abonnementtype_id) {
            abort(403, 'Je hebt geen toegang tot deze les.');
        }

        $voortgang = Voortgang::firstOrCreate(
            [
                'user_id' => $user->id,
                'les_id' => $les->id,
            ],
            [
                'status' => 'bezig'
            ]
        );

        $voortgang->touch();

        $les->load('videos');

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
    public function create()
    {
        if (!auth()->user()->is_admin) {
            abort(403);
        }

        $abonnementTypes = AbonnementType::all();

        return view('lessen.lescreate', compact('abonnementTypes'));
    }

    public function store(Request $request)
    {
        if (!auth()->user()->is_admin) {
            abort(403);
        }

        $request->validate([
            'abonnement_type_id' => 'required|exists:abonnementtypes,id',
            'naam' => 'required|string|max:45',
            'onderwerp' => 'required|string|max:255',
            'beschrijving' => 'required|string',

            'video_naam' => 'required|string|max:255',
            'video' => 'required|string',
        ]);

        preg_match('/src=["\']([^"\']+)["\']/', $request->video, $matches);

        if (!isset($matches[1])) {
            return back()
                ->withErrors(['video' => 'geen goede iframe'])
                ->withInput();
        }

        $youtubeUrl = $matches[1];

        if (!preg_match('/^https:\/\/www\.youtube\.com\/embed\/[a-zA-Z0-9_-]+$/', $youtubeUrl)) {
            return back()
                ->withErrors(['video' => 'geen goede iframe'])
                ->withInput();
        }

        $les = Les::create([
            'naam' => $request->naam,
            'beschrijving' => $request->beschrijving,
            'onderwerp' => $request->onderwerp,
            'abonnement_type_id' => $request->abonnement_type_id,
        ]);

        Video::create([
            'les_id' => $les->id,
            'naam' => $request->video_naam,
            'bestand' => $youtubeUrl,
        ]);

        return redirect()
            ->route('lessen')
            ->with('success', 'succesvol toegevoegd');
    }
}