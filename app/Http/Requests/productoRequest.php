<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class productoRequest extends FormRequest
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
          'nombre' => 'required',
          'stock' => 'required',
          'precio' => 'required',
          'categoria_id' => 'required',
          'proveedor_id' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'nombre.required' => 'Necesito el nombre del producto',
            'stock.required' => 'Necesito el stock del producto',
            'precio.required' => 'Necesito el precio a comercializar del producto',
            'categoria_id.required' => 'Necesito la categoria del producto',
            'proveedor_id.required' => 'Necesito el proveedor del producto',
        ];
    }
}
