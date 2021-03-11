<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'instructions',
        'source_url',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * Get the user that owns the recipe.
     */
    public function user() {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the author that owns the recipe.
     */
    public function author() {
        return $this->belongsTo(Author::class);
    }

    /**
     * Get the ingredients that the recipe calls for.
     */
    public function ingredients() {
        return $this->belongsToMany(Ingredient::class)
                    ->withPivot('amount');
    }
}
