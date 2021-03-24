<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterUserController extends Controller
{
    public function formRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:50',
            'prenom' => 'required|string|max:50',
            'login' => 'required|string|max:30|unique:users',
            'mdp' => 'required|string|confirmed',
        ]);
        $user = new User();
        $user->nom = $request->nom;
        $user->prenom = $request->prenom;
        $user->login = $request->login;
        $user->mdp =  Hash::make($request->mdp);
        $user->save();
        Auth::login($user);
        return redirect('/home');
    }

}
