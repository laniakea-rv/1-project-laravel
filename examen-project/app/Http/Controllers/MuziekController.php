<?php

namespace App\Http\Controllers;
use App\Models\Muziek;
use Illuminate\Http\Request;

class MuziekController extends Controller
{
    public function displayMuziek(){
            $muziek = Muziek::all();
            return view('muziek/Muziek', compact('muziek'));
    }
}
