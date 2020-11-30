<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommandRequest extends FormRequest
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

        return  [
                'nom' => 'required|string',
                'prenom' => 'required|string',
                'email' => 'nullable|email',
                'ville' => 'required|string',
                'address' => 'required|string',
                'tele' => 'required|numeric',
                'product_id' => 'required|integer',
                'lead_id' => 'required|integer',
                'command_quantity' => 'required|integer',
                'notes'=>'nullable|string',
                'command_price' => 'required|integer',

            ];
    }

}
