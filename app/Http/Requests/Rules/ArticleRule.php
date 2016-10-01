<?php

namespace App\Http\Requests\Rules;

use Validator;

class ArticleRule
{
    /**
     * Validate the creating post's data.
     *
     * @param array $data the input data
     *
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public static function creatingValidator(array $data)
    {
        $rules = [
            'title' => 'required|max:255',
            'description' => 'required|max:2048',
            'type' => 'required|max:50',
            'price' => 'numeric',
            'category_detail_id' => 'required|numeric|exists:category_details,id',
            'city_id' => 'required|numeric|exists:cities,id',
            'address' => 'required|max:255',
            'lat' => 'required|numeric',
            'lng' => 'required|numeric',
            'files' => 'required',
            'files.*' => 'required|image|max:5120',
        ];
        return Validator::make($data, $rules);
    }
}
