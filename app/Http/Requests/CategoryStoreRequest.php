<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryStoreRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'supercategory' => ['required', 'string'],
            'category_name' => ['required', 'unique:category', 'string', 'between:2,100']
        ];
    }
}
