<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Drink extends Model
{
    use HasFactory;
    protected $fillable = [
        'drink_name',
        'drink_volume',
        'drink_price',
        'fk_drink_type_id'
    ];
    public $timestamps = false;


    public function getType()
    {
        return $this->hasMany(DrinkType::class, 'id');
    }
}