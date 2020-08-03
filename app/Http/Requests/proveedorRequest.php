<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class proveedorRequest extends FormRequest
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
          'nit' => 'required',
          'nombre' => 'required',
          'direccion' => 'required',
          'telefono' => 'required',
          'correo' => 'required|email',
        ];
    }
    public function messages()
    {
        return [
            'nit.required' => 'Necesito el NIT del proveedor',
            'nombre.required' => 'Necesito el nombre del proveedor',
            'direccion.required' => 'Necesito el direccion del proveedor',
            'telefono.required' => 'Necesito el telefono del proveedor',
            'correo.required' => 'Necesito el email del proveedor',
        ];
    }
}
