<?php 

namespace App\Http\Traits;

use Illuminate\Support\Str;


trait Utilities{

    public function formatPrice(string $price)
    {
        $number_fomart = Str::replace($price, $price.',00 €',$price);
        return $number_fomart;
    }

}