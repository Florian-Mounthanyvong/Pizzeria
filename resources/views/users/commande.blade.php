@extends('modele')
@section('title','Liste de commandes')
@section('contents')
    @foreach($commandes as $commande)
        <p>{{$commande->id}}: Statut: {{$commande->statut}} Date d'ajout: {{$commande->created_at}}, Date de modification: {{$commande->updated_at}} <a href=""><button>Détails</button></a></p>
    @endforeach
    <p> <a href="/arecup"><button>Voir les commandes non-récupérées</button></a></p>
    <a href="/commandes"><button>Voir toutes les commandes</button></a></p>
    <p> <a href="/home"><button>Retour au menu principal</button></a></p>
    <button>{{$commandes->links()}}</button>
@endsection
