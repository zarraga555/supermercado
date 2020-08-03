<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class clienteRequest extends FormRequest
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
          'ci' => 'required',
          'nombre' => 'required',
          'apellido' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'ci.required' => 'Necesito el CI o NIT de cliente',
            'nombre.required' => 'Necesito el nombre del cliente',
            'apellido.required' => 'Necesito el apellido del cliente',
        ];
    }
}
