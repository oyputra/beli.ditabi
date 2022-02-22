<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
            'country'   => 'required|string|min:3|max:40',
            'city'      => 'required|string|min:3|max:40',
            'address'   => 'required|string|min:20',
            'zipcode'   => 'required|numeric',
            'phone'     => 'required|numeric|min:11',
        ];
    }
}
