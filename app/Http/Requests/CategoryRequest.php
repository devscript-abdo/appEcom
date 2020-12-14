<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CategoryRequest extends FormRequest
{

    private $categoryId;

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
        return isset($this->categoryId) ?
            [
                'name' => ['required', 'string', Rule::unique('categories')->ignore($this->categoryId)],
                'type' => 'required|string',

            ] : [
                'name' => 'required|string|unique:categories',
                'type' => 'required|string',
            ];
    }

    public function setId($id)
    {
        $this->categoryId = $id;
    }
}
