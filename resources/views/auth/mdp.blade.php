@extends('modele')
@section('contents')
    <form method="post">
        Nouveau mot de passe: <input type="password" name="mdp">
        Confirmation MDP: : <input type="password"
                                   name="mdp_confirmation">
        <input type="submit" value="Envoyer">
        @csrf
    </form>
@endsection
