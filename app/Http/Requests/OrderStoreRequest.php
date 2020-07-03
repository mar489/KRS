<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderStoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'delivery' => ['required', 'boolean'],
            'surname' => ['required', 'alpha_dash', 'between:1,100'],
            'name' => ['required', 'alpha_dash', 'between:1,100'],
            'patronymic' => ['alpha', 'nullable', 'max:100'],
            'phone' => ['required', 'alpha_dash', 'size:15'],
            'city' => ['required', 'alpha', 'between:2,150'],
            'street' => ['required_if:delivery,1', 'string', 'between:2,150'],
            'house' => ['required_if:delivery,1', 'string', 'max:15'],
            'ap' => ['required_if:delivery,1', 'alpha_num', 'max:6'],
            'comments' => ['string', 'nullable', 'max:255'],
            'pay' => ['required', 'boolean']
        ];
    }
}
