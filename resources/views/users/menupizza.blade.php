@extends('modele')
@section('title','Menu')
@section('contents')
    <a class="text-muted" href="{{route('cart.index')}}" ><button>Panier: <span class="badge badge-pill badge-dark">{{Cart::count()}}</span></button>  </a>
    <p> <a href="/panier/vider"><button> Vider le panier</button></a></p>

    @foreach($pizzas as $pizza)
        <p>{{$pizza->id}}: {{$pizza->nom}}, {{$pizza->prix}}€ <form action="{{route('cart.store')}}" method="POST">
            @csrf
            <input type="hidden" name="id" value="{{$pizza->id}}">
            <button type="submit" class="btn btn-dark">Ajouter au panier</button>

        </form>
            <br> {{$pizza->description}}


    @endforeach
    <p> <a href="/home"><button> Retour au menu principal</button></a></p>
    <p> <a href="/panier/commande"><button> Commander</button></a></p>
    <button>{{$pizzas->links()}}</button>



@endsection
