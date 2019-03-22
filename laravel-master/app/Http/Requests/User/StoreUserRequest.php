<?php

namespace App\Http\Requests\User;

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
     * @return array
     */
    public function rules()
    {
        return [
            'firstnameCreateUser' => 'required|string|max:255',
            'lastnameCreateUser' => 'required|string|max:255',
            'usernameCreateUser' => 'required|string|max:255',
            'phoneCreateUser' => 'required|string|max:255',
            'emailCreateUser' => 'required|string|email|max:255|unique:users,email',
            'passwordCreateUser' => 'required|string|same:repasswordCreateUser|min:6'
        ];
    }
}
