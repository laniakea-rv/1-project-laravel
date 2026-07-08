<?php

namespace App\Http\Controllers;
use App\Models\Muziek;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MuziekController extends Controller
{
    public function index()
    {
        $muziek = Muziek::all();
        return view('muziek.muziek', compact('muziek'));
    }

    public function create()
    {
        return view('muziek.muziekForm');
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'naam' => 'required|string|max:255',
                'beschrijving' => 'nullable|string|max:255',
                'bestand' => 'required|file|mimes:mp3,wav|max:20480',
                'prijs' => 'required|numeric|min:0',
                'afbeelding' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            ]);

            $bestandPad = $request->file('bestand')->store('muziek', 'public');
            $afbeeldingPad = $request->file('afbeelding')->store('muziek-afbeeldingen', 'public');

            Muziek::create([
                'naam' => $validated['naam'],
                'beschrijving' => $validated['beschrijving'],
                'bestand' => $bestandPad,
                'prijs' => $validated['prijs'],
                'afbeelding' => $afbeeldingPad,
            ]);
            return redirect()->route('muziek');
        } catch (ValidationException $e) {
            return back()->withErrors($e->errors());
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Er is een probleempje met het uploaden']);
        }

    }
    public function edit(Muziek $muziek)
    {
        return view('muziek.editMuziek', compact('muziek'));
    }

    public function update(Request $request, Muziek $muziek)
    {
        try {
            $validated = $request->validate([
                'naam' => 'required|string|max:255',
                'beschrijving' => 'nullable|string|max:255',
                'bestand' => 'nullable|file|mimes:mp3,wav|max:20480',
                'prijs' => 'required|numeric|min:0',
                'afbeelding' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            ]);

            $update = [
                'naam' => $validated['naam'],
                'beschrijving' => $validated['beschrijving'],
                'prijs' => $validated['prijs'],
            ];

            if ($request->hasFile('bestand')) {
                if ($muziek->bestand) {
                    Storage::disk('public')->delete($muziek->bestand);
                }
                $bestandPad = $request->file('bestand')->store('muziek', 'public');
                $update['bestand'] = $bestandPad;
            }
            if ($request->hasFile('afbeelding')) {
                if ($muziek->afbeelding) {
                    Storage::disk('public')->delete($muziek->afbeelding);
                }
                $afbeeldingPad = $request->file('afbeelding')->store('muziek-afbeeldingen', 'public');
                $update['afbeelding'] = $afbeeldingPad;
            }

            $muziek->update($update);
            return redirect()->route('muziek');
        } catch (ValidationException $e) {
            return back()->withErrors($e->errors());
        } catch (\Exception $e) {
            dd([
                'Message' => $e->getMessage(),
                'File' => $e->getFile(),
                'Line' => $e->getLine(),
            ]);
        }

    }
}
