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
        <h1 class="text-center">Recettes</h1>
    <p class="text-center my-3">Nos dernières recettes publiées</p>

    <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach($recipes as $recipe)
        <div class="col">
            <div class="card">
                <img class="card-img-top" src="{{ $recipe->imageUrl() }}" alt="{{ $recipe->title }}">
                <div class="card-body">
                    <h5 class="card-title text-center">{{$recipe->title}}</h5>
                    <p class="card-text">{{$recipe->description}}</p>
                    <p class="card-text"><i>Catégorie : {{$recipe->category->name}}</i></p>
                    <p class="card-text"><strong> {{$recipe->author->name}}</strong></p>
                    <a href="{{ route('recettes.show', $recipe->id) }}" class="btn btn-warning">Voir la recette</a>
                </div>
            </div>
        </div>
        @endforeach 
    </div>
    </div>
    
    @include('front.partials.footer')
</body>

</html>