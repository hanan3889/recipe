<?php

namespace App\Http\Controllers;
use App\Models\Recipe;
use App\Models\Category;

class HomeController extends Controller
{
    
    public function index()
    {
        $recipes = Recipe::orderBy('created_at', 'desc')->get();
        $categories = Category::where('isActive', 1)->orderBy('created_at', 'DESC')->with('recipes')->get();

        if (request()->wantsJson()) {
            $recipes->each(function ($recipe) {
                if ($recipe->image) {
                    $recipe->image = url('storage/' . $recipe->image);
                }
            });
            return response()->json([
                'recipes' => $recipes,
                'categories' => $categories
            ], 200);
        }
        else {
            return view('front.app', compact('recipes', 'categories'));
        }
    }

    public function show($id)
    {
        $recipe = Recipe::with(['author', 'category'])->findOrFail($id);

        if (request()->wantsJson()) {
            $recipe->each(function ($recipe) {
                if ($recipe->image) {
                    $recipe->image = url('storage/' . $recipe->image);
                }
            });
            return response()->json($recipe, 200);
        }
        else {
            return view('front.show', compact('recipe'));
        }
    }
}