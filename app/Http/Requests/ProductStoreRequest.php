<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
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
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048', 
            'qty' => 'required|numeric',
            'name' => 'required|string|min:3|max:40',
            'brand' => 'required|string|min:3|max:40',
            'category_id' => 'required|numeric',
            'color' => 'required|string|min:3|max:40',
            'sku' => 'required|string|min:3|max:40',
            'price' => 'required|numeric',
            'detail' => 'required|string|min:20|max:500',
        ];
    }
}
