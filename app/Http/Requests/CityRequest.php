<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CityRequest extends FormRequest
{

    private $cityId;
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
        return isset($this->cityId) ?
            [
                'name' => ['required', 'string', Rule::unique('cities')->ignore($this->cityId)],


            ] : [
                'name' => 'required|string|unique:cities',

            ];
    }

    public function setId($id)
    {
        $this->cityId = $id;
    }
}
