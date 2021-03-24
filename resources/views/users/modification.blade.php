@extends('trame')
@section('title','Modification')
@section('contents')

    @error('mdp')
    <p>Erreur dans le mot de passe: {{$message}}</p>
    @enderror

    <form method="post" action="{{route('uedit',['id'=>$user->id])}}">
        Mot de passe: <input type="text" name="mdp" value="{{old('mdp')}}"><br>
        <input type="submit" value="Envoyer">
        @csrf
    </form>
    <p> <a href="/users"><button>Retour</button></a></p>
@endsection
