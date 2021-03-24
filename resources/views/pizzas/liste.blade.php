@extends('modele')
@section('title','Menu')
@section('contents')
    @foreach($pizzas as $pizza)
        <p>{{$pizza->id}}: {{$pizza->nom}}, {{$pizza->prix}}€ <a href="{{route('peditf',['id'=>$pizza->id])}}"><strong><button>Modifier</button></strong></a>
            <a href="{{route('psupprf',['id'=>$pizza->id])}}"><strong><button>Supprimer</button></strong></a>
        <br> {{$pizza->description}}


    @endforeach

    <p><a href="/pizzas/ajout"> <strong><button>Ajouter</button></strong></a></p>
    <p> <a href="/admin"><button> Retour au menu principal</button></a></p>

@endsection
