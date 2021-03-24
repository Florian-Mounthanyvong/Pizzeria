@extends('trame')
@section('title','Ajout')
@section('contents')
    @error('nom')
    <p>Erreur dans le nom : {{$message}}</p>
    @enderror
    @error('description')
    <p>Erreur dans la description : {{$message}}</p>
    @enderror
    @error('prix')
    <p>Erreur dans le prix : {{$message}}</p>
    @enderror
    <form action="" method="post">
        Nom: <input type="text" name="nom" value="{{old('nom')}}"> <br>
        Description: <input type="text" name="description" value="{{old('description')}}"> <br>
        Prix: <input type="text" name="prix" value="{{old('prix')}}"> <br>
        <input type="submit" value="Envoyer">
        @csrf
    </form>
@endsection
