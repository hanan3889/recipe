@extends('back.app')

@section('title', 'Dashboard - Page des recettes')

@section('dashboard-header')
    <div class="row align-items-center">
        <div class="col">
            <div class="mt-5">
                <h4 class="card-title float-left mt-2">Recettes</h4>
                <a href="{{route('recipe.create')}}" class="btn btn-primary float-right veiwbutton ">Ajouter une recette</a>
            </div>
        </div>
    </div>
@endsection

@section('dashboard-content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card card-table">
                <div class="card-body booking_card">
                    <div class="table-responsive">
                        <table class="datatable table table-stripped table table-hover table-center mb-0">
                            <thead>
                            <tr>
                                <th>ID Recette</th>
                                <th>Image</th>
                                <th>Titre</th>
                                <th>Categorie</th>
                                <th>Publication</th>
                                <th>Partage</th>
                                <th>Commentaires</th>
                                <th>Auteur</th>
                                <th class="text-right">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($recipes as $recipe)
                                <tr>
                                    <td>{{ $recipe->title }}</td>
                                    <td>
                                        <img src="{{ $recipe->imageUrl() }}" alt="{{ $recipe->title }}" width="100" height="100">
                                    </td>
                                    <td>{{ $recipe->title }}</td>
                                    <td>{{ $recipe->category->name }}</td>
                                    <td>
                                        <div class="actions">
                                            @if($recipe->isActive == 1)
                                                <a href="#" class="btn btn-sm bg-success-light mr-2">Publié</a>
                                            @else
                                                <a href="#" class="btn btn-sm bg-success-light mr-2">Non Publié</a>
                                            @endif

                                        </div>
                                    </td>
                                    <td>
                                        <div class="actions">
                                            @if($recipe->isSharable == 1)
                                                <a href="#" class="btn btn-sm bg-success-light mr-2">Active</a>
                                            @else
                                                <a href="#" class="btn btn-sm bg-success-light mr-2">Desactive</a>
                                            @endif
                                        </div>
                                    </td>
                                    <td>
                                        <div class="actions">
                                            @if($recipe->isComment == 1)
                                                <a href="#" class="btn btn-sm bg-success-light mr-2">Active</a>
                                            @else
                                                <a href="#" class="btn btn-sm bg-success-light mr-2">Desactive</a>
                                            @endif

                                        </div>
                                    </td>
                                    <td>
                                        <h2 class="table-avatar">
                                            <a href="" class="avatar avatar-sm mr-2">
                                                <img class="avatar-img rounded-circle" src="{{ asset('back_auth/assets/profil/'.$recipe->author->image) }}" alt="User Image">
                                            </a>
                                            <a href="profile.html">{{ $recipe->author->name}}<span>#00{{$recipe->author->id}}</span></a>
                                        </h2>
                                    </td>
                                    <td class="text-right">
                                        <div class="dropdown dropdown-action">
                                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fas fa-ellipsis-v ellipse_color"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="{{ route('recipe.show', $recipe) }}">
                                                    <i class="fas fa-pencil-alt m-r-5"></i> Voir
                                                </a>
                                                <a class="dropdown-item" href="{{route('recipe.edit', $recipe)}}"> 
                                                    <i class="fas fa-pencil-alt m-r-5"></i> Modifier
                                                </a>
                                                <a class="dropdown-item" href="{{ route('recipe.show', $recipe) }}" data-toggle="modal" data-target="#delete_asset">
                                                    <form action="{{ route('recipe.destroy', $recipe)}}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn text-danger">
                                                            <i class="fas fa-trash-alt m-r-5"></i> Supprimer
                                                        </button>
                                                    </form>

                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
