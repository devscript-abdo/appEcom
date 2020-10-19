<?php

namespace App\Http\Requests;

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
            'nom' => 'required|string',
            'prenom' => 'required|string',
            'tele' => 'required|numeric|unique:admins',
            'email' => 'required|email|unique:admins',
            'address' => 'required|string',
            // 'ville' => 'required|integer',
            //'role' => 'required|integer',
            'password_confirmation' => 'required|min:4',
            'password' => 'required|min:4|confirmed'
        ];
    }
}
