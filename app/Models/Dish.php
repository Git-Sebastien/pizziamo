<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    use HasFactory;

    protected $table = 'dishs';

    protected $fillable = [
        'dish_name',
        'dish_price'
    ];
    public $timestamps = false;
}