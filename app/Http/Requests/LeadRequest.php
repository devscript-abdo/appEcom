<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
        return $this->getId() ?
            [
                'nom' => 'required|string',
                'prenom' => 'required|string',
                'email' => 'nullable|email|unique:leads,email,' . $this->getId(),
                'ville' => 'required|string',
                'address' => 'required|string',
                'tele' => 'required|numeric|unique:leads,tele,' . $this->getId(),
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

            ];
    }



    public function setId($id)
    {
        $this->leadId = $id;
    }

    public function getId()
    {
        return $this->leadId;
    }


    /* public function rules()
    {
        return [
            'nom' => 'required|string',
            'prenom' => 'required|string',
            'email' => 'nullable|email',
            'ville' => 'required|string',
            'address' => 'required|string',
            'tele' => 'required|numeric',
            'produit' => 'required|string',
            'group_id' => 'required|integer',

        ];
    }*/
}
