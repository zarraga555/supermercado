<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class empleadoRequest extends FormRequest
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
          'telefono' => 'required',
          'correo' => 'required|email',
          'direccion' => 'required',
          'sexo' => 'required',
          'salario' => 'required',
          'cargo_id' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'ci.required' => 'Necesito el numero de documento',
            'nombre.required' => 'Necesito el nombre del empleado',
            'nombre.required' => 'Necesito el apellido del empleado',
            'telefono.required' => 'Necesito el telefono del empleado',
            'correo.required' => 'Necesito el email del empleado',
            'direccion.required' => 'Necesito el direccion del empleado',
            'sexo.required' => 'Necesito el sexo del empleado',
            'salario.required' => 'Necesito el salario del empleado',
            'cargo_id.required' => 'Necesito el cargo del empleado',
            // 'turno.required' => 'Necesito el turno del bibliotecario',
            // 'fechaNacimiento.required' => 'Necesito la fecha de nacimiento',
            // 'paisNacimiento.required' => 'Necesito la nacionalidad',
        ];
    }
}
