@extends('modele')
@section('title','Panier')
@section('contents')
    <p> <a href="/menu"><button> Retour au menu de pizzas</button></a></p>
    <p> <a href="/home"><button> Retour au menu principal</button></a></p>


    @foreach(Cart::content() as $pizza)
        <p>{{$pizza->model->id}}: {{$pizza->model->nom}}, {{$pizza->model->prix}}€ <form>
            Quantité:  <input id="moins" type="button" value="-" /><!--
--><input id ="result" type="texte" value="1" maxlength="2" /><!--
--><input id="plus" type="button" value="+" />
        </form>
            <br> {{$pizza->model->description}}

    @endforeach





@endsection
