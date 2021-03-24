@extends('modele')
@section('title','Ajout')
@section('contents')
    @error('user_id')
    <p>Erreur dans l'identifiant d'utilisateur': {{$message}}</p>
    @enderror
    @error('statut')
    <p>Erreur dans le statut: {{$message}}</p>
    @enderror

    <form action="" method="post">

        <input type="submit" value="Effectuer la commande">
        @csrf
    </form>
@endsection
