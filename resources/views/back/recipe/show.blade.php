@extends('back.app')

@section('title', 'Dashboard - Recette')

@section('dashboard-header')
    <div class="row my-5">
        <div class="col-sm-12">
            <h4 class="page-title mb-4">Details de la recette : {{ $recipe->title }}</h4>
        </div>
    </div>
@endsection

@section('dashboard-content')
    <div class="row mt-3">
        <div class="col-md-8">
            <div class="blog-view">
                <article class="blog blog-single-post">
                    <h3 class="blog-title">{{ $recipe->title }}</h3>
                    <div class="blog-image">
                        <a href=""><img alt="" src="{{ $recipe->imageUrl() }}" class="img-fluid mt-4"></a>
                    </div>
                    <div class="blog-content mt-4">
                        <p>
                            {{ $recipe->description }}
                        </p>
                    </div>
                </article>
                <div class="widget">
                    {{-- @foreach($recipe->tags as $tag) --}}
                        {{-- <label class="label label-info btn btn-primary">{{ $tag->name }}</label> --}}
                    {{-- @endforeach --}}
                </div>
                <div class="widget author-widget clearfix">
                    <h3>A propos de l'auteur</h3>
                    <div class="about-author">
                        <div class="about-author-img">
                            <div class="author-img-wrap">
                                <img class="img-fluid rounded-circle" alt="" src="{{ asset('back_auth/assets/profil/'.$recipe->author->image) }}">
                            </div>
                        </div>
                        <div class="author-details">
                            <span class="blog-author-name">{{ $recipe->author->name }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
