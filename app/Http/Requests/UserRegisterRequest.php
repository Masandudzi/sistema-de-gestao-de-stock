<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class UserRegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->user()->hasRole('super-admin');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'username' => 'required|string|min:5|unique:users',
            'email' => 'nullable|email',
            'password' => 'required|string|min:6|confirmed',
            'role' => 'required|exists:roles,slug',
        ];
    }
}
