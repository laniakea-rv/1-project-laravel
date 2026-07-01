<?php

namespace App\Http\Controllers;
use App\Models\Muziek;
use Illuminate\Http\Request;

class MuziekController extends Controller
{
    public function displayMuziek(){

            return view('muziek/Muziek');
    }
}
