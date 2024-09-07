<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreRecipeRequest;
use App\Http\Requests\UpdateRecipeRequest;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('back.recipe.index', [
            'recipes' => Recipe::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('back.recipe.create', ['categories' => Category::where('isActive', 1)->get()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRecipeRequest $request)
    {
        //
        $request->validated($request->all());

        $image = $request->image;

        if ($image != null && !$image->getError()) {
            $image = $request->image->store('asset', 'public');
            
        }

        Recipe::create([
            'title' => $request->title,
            'description' => $request->description,
            'isActive' => $request->isActive,
            'isComment' => $request->isComment,
            'isSharable' => $request->isSharable,
            'image' => $image,

            'category_id' => $request->category_id,
            'author_id' => Auth::user()->id
    ]);

        return to_route('recipe.index')->with('success', 'La recette a bien été ajoutée');

    }

    /**
     * Display the specified resource.
     */
    public function show(Recipe $recipe)
    {
        //
        return view('back.recipe.show', ['recipe' => $recipe]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Recipe $recipe)
    {
        //
        return view('back.recipe.create', [
            'recipe' => $recipe,
            'categories'=> Category::where('isActive', 1)->get()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRecipeRequest $request, Recipe $recipe)
    {
        $request->validated($request->all());

        $image = $request->image;

        if ($image != null && !$image->getError()) {
            if ($recipe->image) {
                Storage::disk('public/')->delete($recipe->image);
            }
            $image = $request->image->store('asset', 'public');
            
        }

        $recipe->update([
            'title' => $request->title,
            'description' => $request->description,
            'isActive' => $request->isActive,
            'isComment' => $request->isComment,
            'isSharable' => $request->isSharable,
            'image' => $image,

            'category_id' => $request->category_id,
            'author_id' => Auth::user()->id
    ]);

        return to_route('recipe.index')->with('success', 'La recette a bien été modifiée');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Recipe $recipe)
    {
        //
        $recipe->delete();

        return to_route('recipe.index')->with('success', 'La recette a bien été supprimée');
    }
}
