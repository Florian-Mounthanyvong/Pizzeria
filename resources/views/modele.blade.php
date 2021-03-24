<!DOCTYPE html>
<html>
<head>
    <meta charset = "utf-8">
    <title>@yield('title')</title>
</head>
<body>
@guest()
    <a href="{{route('login')}}"><button>Connexion</button></a>
    <a href="{{route('register')}}"><button>Inscription</button></a>
@endguest
@auth
    <a href="{{route('logout')}}"><button>Déconnexion</button></a>   <a href="/type"><button>Changer le type d'utilisateur</button></a>
    <p>Bonjour {{ Auth::user()->prenom}} {{ Auth::user()->nom}} </p>
    <p> <a href="/mdp"><button>Modifier son mot de passe</button></a></p>
@endauth
@if( session()->has('etat'))
    <p class="etat">{{session()->get('etat')}}</p>
@endif
@yield('contents')
</body>
</html>
