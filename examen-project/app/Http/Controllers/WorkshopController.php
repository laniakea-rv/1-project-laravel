<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Workshop;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Storage;

class WorkshopController extends Controller
{
    public function index()
    {
        $workshops = Workshop::all();
        return view('workshops.workshops', compact('workshops'));
    }

    public function show(Workshop $workshop)
    {
        $getWorkshop = Workshop::findOrFail($workshop->id);
        return view('workshops.viewWorkshop', ['workshop' => $getWorkshop]);
    }

    public function create()
    {
        return view('workshops.makeWorkshop');
    }

    public function edit(Workshop $workshop)
    {
        return view('workshops.editWorkshop', compact('workshop'));
    }

    public function update(Request $request, Workshop $workshop)
    {
        try {
            $validated = $request->validate([
                'naam' => 'required|string|max:255',
                'beschrijving' => 'required|string',
                'locatie' => 'required|string|max:255',
                'tijd' => 'required|date',
                'afbeelding' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            ]);

            $update = [
                'naam' => $validated['naam'],
                'beschrijving' => $validated['beschrijving'],
                'locatie' => $validated['locatie'],
                'tijd' => $validated['tijd'],
            ];
            if ($request->hasFile('afbeelding')) {
                if ($workshop->afbeelding) {
                    Storage::disk('public')->delete($workshop->afbeelding);
                }
                $afbeeldingPad = $request->file('afbeelding')
                    ->store('workshop-afbeeldingen', 'public');

                $update['afbeelding'] = $afbeeldingPad;
            }

            $workshop->update($update);
            return redirect()->route('workshops');
        } catch (ValidationException $e) {
            return back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            return back()->withErrors([
                'error' => 'Er is een probleempje met het bewerken van de workshop.'
            ])->withInput();
        }
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'naam' => 'required|string|max:255',
            'beschrijving' => 'required|string',
            'locatie' => 'required|string|max:255',
            'tijd' => 'required|date',
            'afbeelding' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $afbeeldingPad = $request->file('afbeelding')->store('workshop-afbeeldingen', 'public');

        Workshop::create([
            'naam' => $validated['naam'],
            'beschrijving' => $validated['beschrijving'],
            'locatie' => $validated['locatie'],
            'tijd' => $validated['tijd'],
            'afbeelding' => $afbeeldingPad,
        ]);

        return redirect()->route('workshops');
    }

    public function inschrijven(Request $request)
    {
        $user = request()->user();
        $workshopId = $request->input('id');

        $heeftIngeschreven = $user->workshops()
            ->where('workshop_id', $workshopId)
            ->exists();

        if ($heeftIngeschreven) {
            return back()->with('error', 'je bent al ingeschreven');
        }

        $user->workshops()->attach($workshopId);

        return back()->with('success', 'je bent ingeschreven');
    }
}
