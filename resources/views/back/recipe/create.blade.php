@extends('back.app')

@section('title', 'Dashboard - Page ajout d une recette')

@section('dashboard-header')
    <div class="row align-items-center">
        <div class="col">
            <h3 class="page-title mt-5">
                @if(isset($recipe)) Modifier 
                @else Ajouter 
                @endif une recette
            </h3>
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
                    <div class="col-12 mb-3">
                        <img src="{{ $recipe->imageUrl() }}" alt="{{ $recipe->title }}" height="200"> 
                    </div>
                    @endif
    
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="title">Titre de la recette</label>
                            <input
                                class="form-control"
                                type="text"
                                name="title"
                                id="title"
                                value="{{ isset($recipe) ? old('title', $recipe->title) : old('title') }}"
                                required/>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="category_id">Catégorie</label>
                            <select class="form-control" id="category_id" name="category_id" required>
                                @foreach($categories as $category) 
                                    <option 
                                        value="{{ $category->id }}" 
                                        @if(isset($recipe)) @selected($recipe->category_id == $category->id) @endif>
                                        {{ $category->name }}
                                    </option>
                                @endforeach 
                            </select>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="customFile">Télécharger une image</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFile" name="image"/>
                                <label class="custom-file-label" for="customFile">Choisir une image</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea
                                class="form-control"
                                rows="5"
                                id="description"
                                name="description"
                                required>{{ isset($recipe) ? old('description', $recipe->description) : old('description') }}</textarea>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-check form-check-inline">
                            <input  class="form-check-input" type="radio"
                                    @if(isset($recipe)) @checked($recipe->isActive == 1) @else checked @endif
                                    id="recette_active" name="isActive" value="1">
                            <label class="form-check-label" for="recette_active">Publier</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" 
                                    @if(isset($recipe)) @checked($recipe->isActive == 0) @endif 
                                    id="recette_inactive" name="isActive" value="0">
                            <label class="form-check-label" for="recette_inactive">Ne pas publier</label>
                        </div>
                    </div>

                    <div class="col-12">
                        <button type="submit" class="btn btn-primary my-5">Enregistrer la recette</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
