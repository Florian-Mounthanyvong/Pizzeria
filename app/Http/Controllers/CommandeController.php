<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommandeController extends Controller
{
    public function list(){


        $user = Auth::user();

        switch ($user->type) {
            case 'admin':
                $commande = Commande::all();
                $path = 'commandes.liste';
                break;
            case 'cook':
                $commande = Commande::where('statut', '=', 'envoye')->get();
                $path = 'cooks.liste';
                break;
            default:
                $commande = Commande::where('user_id', '=', $user->id)->paginate(5);
                $path = 'users.commande';
                break;
        }
        return view($path,['commandes'=>$commande]);
    }
    public function tri(){
        $user = Auth::user();
                $commande = Commande::where('user_id', '=', $user->id) ->where( 'statut', '!=', 'recupere')->paginate(5);
                $path = 'users.commande';
        return view($path,['commandes'=>$commande]);
    }
    public function date(Request $request){
        $validated = $request->validate([
            'date' => 'required',
        ]);
        $date = $validated['date'];
        $commande = Commande::whereDate('created_at', '=', $date)->get();
        $path = 'commandes.liste';
        return view($path,['commandes'=>$commande]);
    }
    public function dateForm()
    {
        return view('commandes.date');
    }
    public function addForm()
    {
        return view('commandes.ajout');
    }
    public function add(Request $request){
        $commande = new Commande();
        $user = Auth::user();
        $commande->user_id = $user->id;
        $commande->statut = 'envoye';
        $commande->save();
        $request->session()->flash('etat', 'Ajout effectué !');
        return redirect('/home')->with('etat', 'Commande effectuée !');

    }

    public function modify(Request $request,$id){
        $commande = Commande::findOrFail($id);
        $validated = $request->validate([
            'statut' => 'max:40',
        ]);
        $commande->statut= $validated['statut'];
        $commande->save();

        $request->session()->flash('etat', 'Modification effectuée !');
        return redirect('/commandes')->with('etat', 'Modification effectuée !');
    }
    public function modifyForm($id){
        $commande = Commande::findOrFail($id);
        return view('commandes.modification',['commande'=>$commande]);
    }
}

