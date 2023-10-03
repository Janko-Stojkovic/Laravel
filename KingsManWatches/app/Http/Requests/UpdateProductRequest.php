<?php

namespace App\Http\Requests;

use App\Rules\UniqueUpdateProductName;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProductRequest extends FormRequest
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
            "name" => ["required", "string", new UniqueUpdateProductName($this->get("productId"))],
            'image' => 'nullable|image|mimes:jpg,jpeg,png,svg,gif|max:6000'
        ];
    }
}
