<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddProductRequest extends FormRequest
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
        return [
            
             'catalog_id' =>'required|integer|min:1', 
             'name' =>'required|min:3', 
             'quantity' =>  'required|integer|min:1', 
             'description' =>  'required|min:3|max:250', 
        ];
    }

  public function messages() {
 
    return [
     
      'catalog_id.required'=>'Select Catatalog of Fields',
      'name.required'=>'Name of product',
      'quantity.required'=>'Quantity of product',
      'description.required'=>'Description of product',

    ];



  }




}


  