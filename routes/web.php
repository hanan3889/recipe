<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\HomeController;


Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/dashboard', function () {
    return view('back.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Route pour les categories
Route::resource('/category', CategoryController::class);

//Route pour les recettes
Route::resource('/recipe', RecipeController::class);

//Route pour les auteurs
Route::resource('/author', UserController::class);

//Partie paramètres
Route::get('/parametre', [SettingsController::class, 'index'])->name('setting.index');
// Route::post('/modifier-parametre', [SettingsController::class, 'update'])->name('setting.update');
Route::match(['put', 'post'], '/modifier-parametre', [SettingsController::class, 'update'])->name('setting.update');

//Front
Route::get('/recettes/{id}', [HomeController::class, 'show'])->name('recettes.show');



require __DIR__.'/auth.php';
