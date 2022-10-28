<?php

namespace App\Models;

use App\Models\Ingredient;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pizza extends Model
{
    use HasFactory;

    protected $fillable = [
        'pizza_name',
        'pizza_price',
        'fk_category_id',
        'pizza_composition',
        'created_at'
    ];

    public $timestamps = false;

    public function ingredients()
    {
        return $this->belongsToMany(Ingredient::class,'pizza_ingredients');
    }
}
