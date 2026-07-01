<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Les;

class LesController extends Controller
{
    public function index()
    {
        $lessen = Les::all();

        return view('lessen.lesindex', [
            'lessen' => $lessen,
        ]);
    }

    public function show($id)
    {
        $les = Les::find($id);

        if (!$les) {
            return view('lessen.redirectles');
        }

        return view('lessen.showles', [
            'les' => $les
        ]);
    }
}