<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthenticatedSessionController extends Controller
{
    public function formLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'login' => 'required|string',
            'mdp' => 'required|string'
        ]);
        $credentials = ['login' => $request->input('login'),
            'password' => $request->input('mdp')];
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $user = Auth::user();

            switch ($user->type) {
                case 'admin':
                    $path = '/admin';
                    break;
                case 'cook':
                    $path = '/cook';
                    break;
                default:
                    $path = '/home';
                    break;
            }
            return redirect($path);

        }
        return back()->withErrors([
            'login' => 'The provided credentials do not match our records.',
        ]);

    }

    public function formMdp()
    {
        return view('auth.mdp');
    }
    public function mdp(Request $request)
    {
        $request->validate([
            'mdp' => 'required|string'
        ]);
        $user = Auth::user();
        $user->mdp = Hash::make($request->mdp);
        $user->save();
        return redirect('/users');
    }
    public function formType()
    {
        return view('auth.type');
    }
    public function type(Request $request)
    {
        $request->validate([
            'type' => 'alpha|max:40|starts_with:admin,cook,user'
        ]);
        $user = Auth::user();
        $user->type = $request->type;
        $user->save();
        switch ($user->type) {
            case 'admin':
                $path = '/admin';
                break;
            case 'cook':
                $path = '/cook';
                break;
            default:
                $path = '/home';
                break;
        }
        return redirect($path);
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/home');
    }
}
