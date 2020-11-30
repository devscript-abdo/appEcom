<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AdminCrudRequest extends FormRequest
{

    private $adminId;

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
        //dd($this->getId());
        return isset($this->adminId) ?
            [
                'nom' => 'required|string',
                'prenom' => 'required|string',
                'tele' => ['required', 'numeric', Rule::unique('admins')->ignore($this->adminId)],
                'email' => ['required', 'email', Rule::unique('admins')->ignore($this->adminId)],
                'address' => 'required|string',
                'city_id' => 'required|integer',
                //'role'=> 'required|integer',
                //'password_confirmation' => 'required|min:4',
                //'password' => 'required|min:4'
            ] : [
                'nom' => 'required|string',
                'prenom' => 'required|string',
                'tele' => 'required|numeric|unique:admins',
                'email' => 'required|email|unique:admins',
                'address' => 'required|string',
                'city_id' => 'required|integer',
                'role' => 'required|integer',
                //'password_confirmation' => 'required|min:4',
                'password' => 'required|min:4'

            ];
    }


    public function setId($id)
    {
        $this->adminId = $id;
    }

}
