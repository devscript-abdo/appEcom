<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RoleRequest extends FormRequest
{

    private $roleId;

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

        return isset($this->roleId) ?
            [
                'name' => ['required', 'string', Rule::unique('roles')->ignore($this->roleId)],
            ] : [
                'name' => 'required|string|unique:roles',
            ];
    }

    public function setId($id)
    {
        $this->roleId = $id;
    }
}
