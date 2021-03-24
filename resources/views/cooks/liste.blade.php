@extends('modele')
@section('title','Liste de commandes')
@section('contents')
    @foreach($commandes as $commande)
        <p>{{$commande->id}}: Utilisateur n°{{$commande->user_id}}, Statut: {{$commande->statut}} Date d'ajout: {{$commande->created_at}}, Date de modification: {{$commande->updated_at}} <a href="{{route('ceditf',['id'=>$commande->id])}}"><strong><button>Modifier</button></strong></a><a href=""><strong><button>Détails</button></strong></a></p>
    @endforeach
    <p> <a href="/cook">Retour au menu principal</a></p>

@endsection
