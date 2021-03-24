<?php

namespace App\Http\Controllers;

use App\Models\Pizza;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PizzaController extends Controller
{
    public function list(){

        $user = Auth::user();

        switch ($user->type) {
            case 'admin':
                $p = Pizza::all();
                $path = 'pizzas.liste';
                break;
            default:
                $p = Pizza::paginate(5);
                $path = 'users.menupizza';
                break;
        }
        return view($path,['pizzas'=>$p]);
    }
    public function addForm()
    {
        return view('pizzas.ajout');
    }
    public function add(Request $request){

        $validated = $request->validate([
            'nom' => 'required|alpha_dash|max:40',
            'description' => 'required|max:500',
            'prix' => 'bail|required|numeric|gte:0|lte:120',
        ]);
        $user = new Pizza();
        $user->nom = $validated['nom'];
        $user->description = $validated['description'];
        $user->prix = $validated['prix'];
        $user->save();
        $request->session()->flash('etat', 'Ajout effectué !');
        return redirect('/menu')->with('etat', 'Ajout effectué !');

    }
    public function delete(Request $request,$id){
        $pizza = Pizza::findOrFail($id);
        $validated = $request->validate([
            'id' => 'bail|required|integer|gte:0|lte:120',

        ]);
        $id = $validated['id'];

        $pizza->delete();
        $request->session()->flash('etat', 'Suppression effectuée !');
        return redirect('/menu')->with('etat', 'Suppression effectuée !');
    }
    public function deleteForm($id){
        $pizza = Pizza::findOrFail($id);
        return view('pizzas.suppression',['pizza'=>$pizza]);
    }
    public function modify(Request $request,$id){
        $pizza = Pizza::findOrFail($id);
        $validated = $request->validate([
            'nom' => 'alpha_dash|max:40',
            'description' => 'max:500',
        ]);

        $pizza->nom = $validated['nom'];
        $pizza->description= $validated['description'];
        $pizza->save();

        $request->session()->flash('etat', 'Modification effectuée !');
        return redirect('/menu')->with('etat', 'Modification effectuée !');
    }
    public function modifyForm($id){
        $pizza = Pizza::findOrFail($id);
        return view('pizzas.modification',['pizza'=>$pizza]);
    }
}
