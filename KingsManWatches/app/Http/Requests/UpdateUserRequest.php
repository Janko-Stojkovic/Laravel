<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
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
    private $usernamePattern = "/^(?=.*[a-z])[a-zA-Z0-9\_]{4,25}$/";
    private $emailPattern = "/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/";
    private $passwordPattern = "/^$|^((?=.*\d)(?=.*[a-z]).{8,})$/";

    public function rules()
    {
        return [
            "username" => ["required", "regex:" . $this->usernamePattern, Rule::unique('users')->ignore($this->user)],
            "email" => ["required", "regex:" . $this->emailPattern, Rule::unique('users')->ignore($this->user)],
            "password" => ["nullable", "regex:" . $this->passwordPattern],
            "role" => ["required", "exists:roles,id"]
        ];
    }
}
