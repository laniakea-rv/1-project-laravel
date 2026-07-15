<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Abonnement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function showusers()
    {

        $users = User::with('abonnementen.abonnementtype')->get();
        return view('userOverview', compact('users'));
    }

    
    public function showUser()
    {
        $user = request()->user();

        $huidigAbonnement = $user->abonnementen()
            ->where('actief', 1)
            ->first();

        return view('userDisplay', compact('user', 'huidigAbonnement'));
    }
}
