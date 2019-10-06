<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditCatalogRequest extends FormRequest
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

             'name' =>'required|min:3', 
             'catalog_type' =>'required|min:3|max:250', 
             'description' =>'required|min:3|max:250', 
        ];
    }



 
  public function messages() {
 
    return [
     
      'name.required'=>'Name of catalog',
      'catalog_type.required'=>'Category Type of catalog',
      'description.required'=>'Description of catalog',

    ];



  }

}
