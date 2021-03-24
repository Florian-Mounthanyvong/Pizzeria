@extends('trame')
@section('title','Ajout')
@section('contents')
    @error('nom')
    <p>Erreur dans le nom : {{$message}}</p>
    @enderror
    @error('prenom')
    <p>Erreur dans le prénom: {{$message}}</p>
    @enderror
    @error('login')
    <p>Erreur dans le login: {{$message}}</p>
    @enderror
    @error('mdp')
    <p>Erreur dans le mot de passe: {{$message}}</p>
    @enderror
    @error('type')
    <p>Erreur dans le type d'utilisateur: {{$message}}</p>
    @enderror

    <form action="" method="post">
        Nom: <input type="text" name="nom" value="{{old('nom')}}">
        Prénom: <input type="text" name="prenom" value="{{old('prenom')}}"><br>
        Login: <input type="text" name="login" value="{{old('login')}}">
        Mot de passe: <input type="text" name="mdp" value="{{old('mdp')}}"><br>
        Type d'utilisateur: <input type="text" name="type" value="{{old('type')}}">
        <input type="submit" value="Envoyer">
        @csrf
    </form>
@endsection
