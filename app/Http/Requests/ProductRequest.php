<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{

    private $productId;
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
        if ($this->productId) {
            return  $this->updateRules();
        } else {
            return  $this->createRules();
        }
    }

    private function updateRules()
    {

        return  [
            'name' => 'required|string|unique:products,name,' .  $this->productId,
            //'slug' => 'required|string|unique:products,slug,'. $this->productId,
            'photo' => 'nullable|string',
            'description' => 'required|string',
            'quantity' => 'required|integer',
            'price' => 'required|integer',
            'category_id' => 'required|integer',
        ];
    }
    private function createRules()
    {


        return [
            'name' => 'required|string|unique:products',
            //'slug' => 'required|string|unique:products',
            'photo' => 'nullable|string',
            'description' => 'required|string',
            'quantity' => 'required|integer',
            'price' => 'required|integer',
            'category_id' => 'required|integer',

        ];
    }
    public function setId($id)
    {

        $this->productId = $id;
    }
}
