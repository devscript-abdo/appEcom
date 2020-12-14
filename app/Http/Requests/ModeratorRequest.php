<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ModeratorRequest extends FormRequest
{
    private $userId;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return isset($this->userId) ?
            [
                'nom' => 'required|string',
                'prenom' => 'required|string',
                'tele' => ['required', 'numeric', Rule::unique('moderators')->ignore($this->userId)],
                'email' => ['required', 'email', Rule::unique('moderators')->ignore($this->userId)],
                'address' => 'required|string',
                'city_id' => 'required|integer',
                //'role'=> 'required|integer',
                //'password_confirmation' => 'required|min:4',
                //'password' => 'required|min:4'
            ] : [
                'nom' => 'required|string',
                'prenom' => 'required|string',
                'tele' => 'required|numeric|unique:moderators',
                'email' => 'required|email|unique:moderators',
                'address' => 'required|string',
                'city_id' => 'required|integer',
                'addedBy'=>'required|string',
                //'password_confirmation' => 'required|min:4',
                'password' => 'required|string|min:4'

            ];
    }

    public function setId($id)
    {
        $this->userId = $id;
    }
}
