<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TreasuryRequest extends FormRequest
{

    private $Id;
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
        return isset($this->Id) ?
            [
               // 'name' => ['required', 'string', Rule::unique('treasuries')->ignore($this->Id)],
              //  'type' => 'required|string',
                'name' => 'required|string|unique:treasuries',
                'type' => 'required|string',
                'title' => 'required|string',
                'banque' => 'nullable|string',
                'client' => 'nullable|string',
                'designation' => 'required|string',
                'total'=> 'required|integer',

            ] : [
                'type' => 'required|string',
                'title' => 'required|string',
                'banque' => 'nullable|string',
                'client' => 'nullable|string',
                'designation' => 'required|string',
                'total'=> 'required|integer',

            ];
    }

    public function setId($id)
    {
        $this->Id = $id;
    }
}
