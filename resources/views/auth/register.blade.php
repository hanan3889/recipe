@extends('auth.auth-layout')

@section('title', 'Page d\'inscription')

@section('auth-form')
<h1 class="mb-3">S'inscrire</h1>
<form action="{{route('register')}}" method="POST">
    @csrf
    <div class="form-group">
        <input class="form-control" name="name" type="text" value="{{old('name')}}" placeholder="Nom">
        @error('name')
            <p class="text-red-500 mt-2">{{$message}}</p>
        @enderror
    </div>
    <div class="form-group">
        <input class="form-control" name="email" type="email" value="{{old('email')}}" placeholder="Email">
        @error('email')
            <p class="text-red-500 mt-2">{{$message}}</p>
        @enderror
    </div>
    <div class="form-group">
        <input class="form-control" name="password" type="password" value="{{old('password')}}" placeholder="Mot de passe">
        @error('password')
            <p class="text-red-500 mt-2">{{$message}}</p>
        @enderror
    </div>
    <div class="form-group">
        <input class="form-control" name="password_confirmation" type="password" value="{{old('password_confirmation')}}" placeholder="Confirmer Mot de passe">
        @error('password_confirmation')
            <p class="text-red-500 mt-2">{{$message}}</p>
        @enderror
    </div>
    <div class="form-group mb-0">
        <button class="btn btn-primary btn-block" type="submit">S'inscrire</button>
    </div>
</form>

<div class="text-center dont-have">Vous avez deja un compte ? <a href="{{route('login')}}">Se connecter</a> 
</div>

@endsection