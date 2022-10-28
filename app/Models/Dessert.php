<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dessert extends Model
{
    use HasFactory;

    protected $fillable = [
        'dessert_name',
        'dessert_price',
        'dessert_composition'
    ];

    public $timestamps = false;

    public function ingredients()
    {
        return $this->hasMany(DessertIngredient::class,'fk_dessert_id');
    }
}
