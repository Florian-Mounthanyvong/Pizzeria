@extends('trame')
@section('title','Modification')
@section('contents')
    @error('nom')
    <p>Erreur dans le nom : {{$message}}</p>
    @enderror
    @error('description')
    <p>Erreur dans la description : {{$message}}</p>
    @enderror

    <form method="post" action="{{route('pedit',['id'=>$pizza->id])}}">
        Pizza: <input type="text" name="nom" value="{{$pizza->nom}}">
        Description: <input type="text" name="description" value="{{$pizza->description}}">
        <input type="submit" value="Valider">
        @csrf
    </form>
@endsection
