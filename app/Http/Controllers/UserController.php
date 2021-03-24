<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function list(){
        $user = User::all();
        return view('users.liste',['users'=>$user]);
    }
    public function addForm()
    {
        return view('users.ajout');
    }
    public function add(Request $request){

        $validated = $request->validate([
            'nom' => 'required|alpha|max:40',
            'prenom' => 'required|alpha|max:40',
            'login' => 'required|max:40',
            'mdp' => 'required|max:60',
            'type' => 'required|alpha|max:40|starts_with:admin,cook',
        ]);
        $user = new User();
        $user->nom = $validated['nom'];
        $user->prenom = $validated['prenom'];
        $user->login = $validated['login'];
        $user->mdp = $validated['mdp'];
        $user->type= $validated['type'];
        $user->save();
        $request->session()->flash('etat', 'Ajout effectué !');
        return redirect('/users')->with('etat', 'Ajout effectué !');

    }
    public function delete(Request $request,$id){
        $user = User::findOrFail($id);
        $validated = $request->validate([
            'id' => 'bail|required|integer|gte:0|lte:120',

        ]);
        $id = $validated['id'];

        $user->delete();
        $request->session()->flash('etat', 'Suppression effectuée !');
        return redirect('/users')->with('etat', 'Suppression effectuée !');
    }
    public function deleteForm($id){
        $user = User::findOrFail($id);
        $user = User::findOrFail($id);
        if($user->type!='user'){
            return view('users.suppression',['user'=>$user]);
        }
        else{
            return redirect('/users')->with('etat', 'Le compte appartient à un utilisateur normal !');
        }

    }

    public function modify(Request $request,$id){
        $user = User::findOrFail($id);
        $validated = $request->validate([
            'mdp' => 'max:60',
        ]);
        $user->mdp = Hash::make($validated['mdp']);
        $user->save();

        $request->session()->flash('etat', 'Modification effectuée !');
        return redirect('/users')->with('etat', 'Modification effectuée !');
    }
    public function modifyForm($id){
        $user = User::findOrFail($id);
        if($user->type=='cook'){
            return view('users.modification',['user'=>$user]);
        }
        else{
            return redirect('/users')->with('etat', 'Le mot de passe n appartient pas à un pizzaiolo !');
        }
    }
}
