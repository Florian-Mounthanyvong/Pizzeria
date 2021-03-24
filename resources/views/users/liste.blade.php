@extends('modele')
@section('title','Liste utilisateurs')
@section('contents')
    @foreach($users as $user)
        <p>{{$user->id}}: Nom: {{$user->nom}}, Prénom: {{$user->prenom}} <br> Login: {{$user->login}} <br> Mot de passe: {{$user->mdp}} <br> Type d'utilisateur: {{$user->type}} <a href="{{route('ueditf',['id'=>$user->id])}}"><strong><button>Modifier</button></strong></a>
            <a href="{{route('usupprf',['id'=>$user->id])}}"><strong><button>Supprimer</button></strong></a></p>
    @endforeach
    <p><a href="/users/ajout"><button>Ajouter</button></a></p>
    <p> <a href="/admin"><button>Retour au menu principal</button></a></p>

@endsection
