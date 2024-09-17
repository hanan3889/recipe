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
        <img class="card-img-top img-fluid" src="{{ $recipe->imageUrl() }}" alt="{{ $recipe->title }}">
        <p class="text-center my-3">{{$recipe->description}}</p>
        
        <p class="card-text"><i>Catégorie : {{$recipe->category->name}}</i></p>
        <p class="card-text"><strong> {{$recipe->author->name}}</strong></p>
        <a class="btn btn-warning" href="{{ route('home') }}">Retour</a>
    </div>
</body>
</html>