@extends('trame')
@section('title','Modification')
@section('contents')

    @error('statut')
    <p>Erreur dans le statut: {{$message}}</p>
    @enderror

    <form method="post"action="{{route('cedit',['id'=>$commande->id])}}">
        Statut: <input type="text" name="statut" value="{{$commande->statut}}">
        <input type="submit" value="Envoyer">
        @csrf
    </form>
@endsection
