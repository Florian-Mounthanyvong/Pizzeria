@extends('modele')
@section('contents')
    <form method="post">
        Type: <input type="type" name="type">
        <input type="submit" value="Envoyer">
        @csrf
    </form>
@endsection
