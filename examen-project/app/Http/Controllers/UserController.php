<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Abonnement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function showUser()
    {
        $user = request()->user();

        $huidigAbonnement = $user->abonnementen()
            ->where('actief', 1)
            ->first();

        return view('users.userDisplay', compact('user', 'huidigAbonnement'));
    }

    public function editUser()
    {
        $user = request()->user();
        return view('users.userEdit', compact('user'));
    }

    public function updateUser(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
        ]);

        $user->update($validatedData);

        return redirect()->route('user')->with('success', 'Profiel succesvol bijgewerkt.');
    }
}
