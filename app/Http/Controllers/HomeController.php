<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;
use App\Models\Category;

class HomeController extends Controller
{
    //

    public function index()
    {
        $recipes = Recipe::orderBy('created_at', 'desc')->take(3)->get();
        $categories = Category::where('isActive', 1)->orderBy('created_at', 'DESC')->with('recipes')->get();
        
        return view('front.app', compact('recipes', 'categories'));
    }

    public function show($id)
{
    // Récupérer la recette avec ses relations author et category
    $recipe = Recipe::with(['author', 'category'])->findOrFail($id);

    // Retourner la vue avec la recette spécifique
    return view('front.show', compact('recipe'));
}
}
