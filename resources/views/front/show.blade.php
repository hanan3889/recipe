<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Casserole en folie</title>
    <link href="{{asset('front/img/logo.png')}}">

    @include('front.partials.styles')
    @include('front.partials.script')
    @include('front.partials.header')
</head>
<body>
    <div class="container my-5">
        <h1 class="text-center my-3">{{$recipe->title}}</h1>
        <img class="card-img-top" src="{{ $recipe->imageUrl() }}" alt="{{ $recipe->title }}">
        <p>{{$recipe->description}}</p>
        <p>Catégorie : {{$recipe->category->name}}</p>
        <p>Auteur : {{$recipe->author->name}}</p>
        <a class="btn btn-warning" href="{{ route('home') }}">Retour</a>
    </div>
</body>
</html>