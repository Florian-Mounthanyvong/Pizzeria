@extends('trame')
@section('title','Suppression')
@section('contents')
    @error('id')
    <p>Erreur dans l'id': {{$message}}</p>
    @enderror


    <form method="post" action="{{route('psuppr',['id'=>$pizza->id])}}">
        Id: <input type="text" name="id" value="{{$pizza->id}}">
        <input type="submit" value="Confirmer la suppression">
        @csrf
    </form>
@endsection
