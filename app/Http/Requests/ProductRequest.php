<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    //! REGLAS DE VALIDACION DE PRODUCTOS
    public function rules()
    {
        return [
            'name' =>   'required',
            'reference'  =>  'required',
            'price'  => 'required|integer',
            'weight' => 'required|integer',
            'category_id' => 'required',
            'stock' => 'required|integer'
        ];
    }
    //! MENSAJES PERSONALIZADOS PARA LAS REGLAS DE VALIDACIÓN
    public function messages()
    {
        return
        [
            'name.required' => 'Debe indicar un nombre para el producto',
            'reference.required' => 'Debe indicar una referencia para el producto',
            'price.required' => 'Debe indicar un precio para el producto',
            'weight.required' => 'Debe indicar una cantidad para el producto',
            'category_id.required' => 'Debe indicar una categoria para el producto',
            'stock.required' => 'Debe indicar un peso para el producto',

            'price.integer' => 'El precio debe ser un número',
            'weight.integer' => 'El peso debe ser un número',
            'stock.integer' => 'El stock debe ser un número',
        ];
    }
}
