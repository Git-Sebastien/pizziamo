<?php

namespace App\Http\Traits;

use Illuminate\Support\Str;


trait Utilities
{
    /**
     * sortModel
     * Sort multiple model  and create an array 
     * @param  mixed $models
     * @return array
     */
    public static function sortModel(array $models, int $is_deleted = 0): array
    {
        $array_of_model = [];
        foreach ($models as $k => $model) {
            $format_model_key = Str::plural(Str::lcfirst(Str::after($model, 'App\Models\\')));
            $array_of_model[] = [$format_model_key => $model::all()->where('is_deleted', '=', $is_deleted)];
        }
        return $array_of_model;
    }

    /**
     * sortModelWithRelation
     * Sort model with one relation
     * @param  mixed $model
     * @param  mixed $relation
     * @param  mixed $is_deleted
     * @return void
     */
    public function sortModelWithRelation(string $model, string $relation, int $is_deleted = 0)
    {
        return $model = $model::with([$relation])->where('is_deleted', '=', $is_deleted)->get();
    }

    /**
     * sortArrayOfModel
     * Sort all the model passed to sortModel
     * @param  mixed $models_sort
     * @return array
     */
    public function sortArrayOfModel(array $models_sort): array
    {
        $array = [];
        foreach ($models_sort as $key => $value) {
            foreach ($models_sort[$key] as $data) {
                foreach (array_keys($value) as $array_keys) {
                    $array[$array_keys] = $data;
                }
            }
        }

        return $array;
    }

    public function generateHash()
    {
        return substr(md5(openssl_random_pseudo_bytes(20)), -32);
    }
}