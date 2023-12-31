<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:150',
            'price' => 'required|numeric|min:1',
            'brandId' => 'required|string|in:1,2,3,4,5,6,7,8,9,10,11,12',
            'image' => 'required|file|mimes:jpg,png|max:2048',
            'imageHover' => 'required|file|mimes:jpg,png|max:2048'
        ];
    }
}
