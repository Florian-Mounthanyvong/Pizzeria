@extends('modele')
@section('contents')
    @error('nom')
    <p>Erreur dans le nom: {{$message}}</p>
    @enderror
    @error('prenom')
    <p>Erreur dans le prenom: {{$message}}</p>
    @enderror
    @error('login')
    <p>Erreur dans le login: {{$message}}</p>
    @enderror
    @error('mdp')
    <p>Erreur dans le mot de passe: {{$message}}</p>
    @enderror

    <p>Enregistrement</p>
    <form method="post">
        Nom: <input type="text" name="nom" value="{{old('nom')}}">
        Prénom: <input type="text" name="prenom" value="{{old('prenom')}}">
        Login: <input type="text" name="login" value="{{old('login')}}">
        MDP: <input type="password" name="mdp">
        Confirmation MDP: <input type="password"
                                   name="mdp_confirmation">
        <input type="submit" value="Envoyer">
        @csrf
    </form>
@endsection
