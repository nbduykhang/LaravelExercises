<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomRequest extends FormRequest
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
            'firstnameRegister' => 'required|string|max:255',
            'lastnameRegister' => 'required|string|max:255',
            'usernameRegister' => 'required|string|max:255',
            'phoneRegister' => 'required|string|max:255',
            'emailRegister' => 'required|string|email|max:255|unique:users,email',
            'passwordRegister' => 'required|string|same:passwordRegister|min:6',
        ];
    }
}
