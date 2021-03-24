@extends('trame')
@section('title','Date')
@section('contents')
    @error('date')
    <p>Erreur dans la date: {{$message}}</p>
    @enderror

    <form action="" method="post">
        Date: <input type="text" name="date" value="{{old('date')}}"> <br>
        <input type="submit" value="Envoyer">
        @csrf
    </form>
@endsection
