@extends('modele')
@section('title','Liste de commandes')
@section('contents')
    @foreach($commandes as $commande)
        <p>{{$commande->id}}: Utilisateur n°{{$commande->user_id}}, Statut: {{$commande->statut}} Date d'ajout: {{$commande->created_at->format('Y-m-d')}}, Date de modification: {{$commande->updated_at->format('Y-m-d')}} </p>
    @endforeach
    <p> <a href="/admin"><button>Retour au menu principal</button></a></p>
    <p> <a href="/date"><button>Voir les commandes passées pour un jour précis</button></a></p>
    <p> <a href="/commandes"><button>Voir toutes les commandes</button></a></p>
@endsection
