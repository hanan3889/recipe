<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Recipe extends Model
{
    use HasFactory, HasSlug;

    protected $fillable = [
        'title',
        'slug',
        'image', 
        'description',
        'isActive',
        'isComment',
        'isSharable',

        'category_id',
        'author_id',
    ];

    //On genere le slug a partir du nom
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    //On utilise le slug au lieu de l ID
    public function getRouteKeyName()
    {
        return 'slug';
    }
    
    //on cre un lien vers l image
    public function imageUrl()
    {
        return asset('storage/'.$this->image);
    }

    //relation avec la categorie
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    //Relation avec la table User
    public function author()
    {
        return $this->belongsTo(User::class, 'author_id', 'id');
    }
}
