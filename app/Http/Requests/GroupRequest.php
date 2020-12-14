<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class GroupRequest extends FormRequest
{
    private $groupId;

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
        return isset($this->groupId) ?
            [
                'name' => ['required', 'string', Rule::unique('groups')->ignore($this->groupId)],
                'description' => 'nullable|string',
            ] : [
                'name' => 'required|string|unique:groups',
                'description' => 'nullable|string',
            ];
    }

    public function setId($id)
    {
        $this->groupId = $id;
    }
}
