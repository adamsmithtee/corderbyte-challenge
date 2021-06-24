<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'full_name' => 'required',
            'username' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
            'role_id' => 'required'
        ];
    }

    /**
     * Custom message for validation
     *
     * @return array
     */
    public function messages()
	{
		return [
            'full_name.required' => 'Specify the name',
            'username' => 'Specify the username',
            'email.required' => 'Specify the email',
            'password.required' => 'Specify the password'
		];
	}

}
