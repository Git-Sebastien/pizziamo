<?php

namespace App\Models;

use App\Models\Ingredient;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class IngredientType extends Model
{
    use HasFactory;

    protected $fillable = [
        'ingredient_type'
    ];

    public function ingredient()
    {
        return $this->belongsToMany(Ingredient::class,'ingredients');
    }
}
