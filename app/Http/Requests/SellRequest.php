<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SellRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'quantity' =>   'required|integer',
            'product_id' =>   'required',
        ];
    }

    public function messages()
    {
        return
        [
            'quantity.required' => 'Debe escribir una cantidad',
        ];
    }
}
