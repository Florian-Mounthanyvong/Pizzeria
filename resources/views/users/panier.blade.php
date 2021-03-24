@extends('modele')
@section('title','Panier')
@section('contents')
    <p> <a href="/menu"><button> Retour au menu de pizzas</button></a></p>
    <p> <a href="/home"><button> Retour au menu principal</button></a></p>


        @foreach($pizzas as $pizza)
            <p>{{$pizza->id}}: {{$pizza->nom}}, {{$pizza->prix}}€
                <br> {{$pizza->description}}

            <form action="{{route('cart.destroy'),$pizza->rowId}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Supprimer</button></p>
            </form>
            @endforeach

@endsection
