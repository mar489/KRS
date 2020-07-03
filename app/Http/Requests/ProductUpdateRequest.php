<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductUpdateRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'category_name' => ['required', 'string'],
            'product_name' => ['required', 'unique:product', 'string', 'between:3,100'],
            'product_code' => ['required', 'alpha_dash', 'size:6'],
            'product_price' => ['required', 'numeric'],
            'color' => ['required', 'alpha_dash', 'between:3,50'],
            'material' => ['required', 'string', 'between:2,50'],
            'brand' => ['required', 'string', 'between:2,50'],
            'weight' => ['numeric', 'max:1000000'],
            'product_descr' => ['required', 'string', 'between:10,10000'],
            'is_available' => ['required','boolean'],
            'product_status' => ['alpha_dash'],
            'img' => ['required', 'mimetypes:image/jpeg,image/png,image/jpg', 'max:30000'],

        ];
    }
}
