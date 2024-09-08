@extends('back.app')

@section('title', 'Dashboard - Page ajout d une recette');

@section('dashboard-header')
    <div class="row align-items-center">
        <div class="col">
            <h3 class="page-title mt-5">
                @if(isset($recipe)) Modifier 
                @else Ajouter 
                @endif une recette</h3>
        </div>
    </div>
@endsection

@section('dashboard-content')
    <div class="row">
        <div class="col-lg-12">
            <form action="{{ isset($recipe) ? route('recipe.update', $recipe) : route('recipe.store') }}" 
                method="POST" enctype="multipart/form-data">
                @csrf
                @if(isset($recipe)) 
                    @method('PUT')
                @endif
            
                <div class="row formtype">
                    @if(isset($recipe))
                    <div class="col-12">
                        <img src="{{$recipe->imageUrl()}}" alt="{{$recipe->title}}" style="" height="200"> 
                    </div>
                    @endif
    
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Titre de la recette</label>
                            <input
                                class="form-control"
                                type="text"
                                name="title"
                                value="{{ isset($recipe) ? old('title', $recipe->title) : old('title') }}"/>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Categorie</label>
                            <select class="form-control" id="sel1" name="category_id">
                                @foreach($categories as $category) 
                                    <option @if(isset($recipe)) @selected($recipe->category_id == $category->id) @endif value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach 
                            </select>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Télécharger une image</label>
                            <div class="custom-file mb-3">
                                <input type="file" class="custom-file-input" id="customFile" name="image"/>
                                <label class="custom-file-label" for="customFile">Choisir une image</label>
                            </div>
                        </div>
                    </div>

                    <textarea
                        class="form-control"
                        rows="5"
                        id="comment"
                        name="description">
                            {{ isset($recipe) ? old('description', $recipe->description) : old('description')}}
                    </textarea>


                    </div>


                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Publication</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input  class="form-check-input" type="radio"
                                @if(isset($recipe)) @checked($recipe->isActive == 1) 
                                @else checked
                                @endif type="radio" id="recette_active" name="isActive" value="1">
                            <label class="form-check-label" for="recette_active">Publier</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" 
                                @if(isset($recipe)) @checked($recipe->isActive == 0) 
                                @endif 
                                id="recette_inactive" name="isActive" value="0">
                            <label class="form-check-label" for="recette_inactive">Ne pas publier</label>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Partages</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" 
                            @if(isset($recipe)) @checked($recipe->isSharable == 1) @else checked @endif id="recette_share_active" name="isSharable" value="1"
                            >
                            <label class="form-check-label" for="recette_share_active">Partageable</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="recette_share_inactive" 
                                @if(isset($recipe)) @checked($recipe->isSharable == 0) @endif name="isSharable" value="0">
                            <label class="form-check-label" for="recette_share_inactive">Non Partageable</label>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Commentaires</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="recette_comment_active" 
                                @if(isset($recipe)) @checked($recipe->isComment == 1)  
                                @else checked 
                                @endif name="isComment" value="1" 
                                >
                            <label class="form-check-label" for="recette_comment_active">Autorise</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="recette_comment_inactive" 
                                @if(isset($recipe)) @checked($recipe->isComment == 0) 
                                @endif name="isComment" value="0">
                            <label class="form-check-label" for="recette_comment_inactive">Non autorise</label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary  my-5">Enregistrer la recette</button>
                </div>
            </form>
        </div>
    </div>
@endsection
