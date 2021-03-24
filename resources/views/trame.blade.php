<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <style>
        .etat {background-color: lightblue;}
    </style>
</head>
<body>
@if( session()->has('etat'))
    <p class="etat">{{session()->get('etat')}}</p>
@endif
@section('contents')
@show
</body>
</html>
