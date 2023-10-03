<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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

    private $emailPattern = "/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/";
    private $passwordPattern = "/^((?=.*\d)(?=.*[a-z]).{6,})$/";

    public function rules()
    {
        return [
            "username" => ["required", "max:25","min:4", "unique:users"],
            "email" => ["required", "regex:" . $this->emailPattern, "unique:users"],
            "password" => ["required", "regex:" . $this->passwordPattern],
            "role" => ["required", "exists:roles,id"]
        ];
    }
}
