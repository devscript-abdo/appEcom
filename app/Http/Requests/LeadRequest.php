<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class LeadRequest extends FormRequest
{

    private $leadId;


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

       // dd($this->getId());
        return isset($this->leadId) ?
            [
                'nom' => 'required|string',
                'prenom' => 'required|string',
                'tele' => ['required', 'numeric', Rule::unique('leads')->ignore($this->leadId)],
                'email' => ['nullable', 'email', Rule::unique('leads')->ignore($this->leadId)],
                'ville' => 'required|string',
                'address' => 'required|string',
                'produit' => 'required|string',
                'group_id' => 'nullable|integer',
            ] : [
                'nom' => 'required|string',
                'prenom' => 'required|string',
                'email' => 'nullable|email',
                'ville' => 'required|string',
                'address' => 'required|string',
                'tele' => 'required|numeric',
                'produit' => 'required|string',
                'group_id' => 'nullable|integer',
               // 'addedby'=>'nullable|string',

            ];
    }

    public function setId($id)
    {
        $this->leadId = $id;
    }

}
