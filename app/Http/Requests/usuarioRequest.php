<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class usuarioRequest extends FormRequest
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
          'email' => 'required|email',
          'password' => 'required',
          'empleado_id' => 'required',
        ];
    }
    public function messages()
    {
        return [
          'correo.required' => 'Necesito el correo eleectronico',
          'password.required' => 'Necesito la contraseña',
          'empleado_id.required' => 'Necesito el empleado',
        ];
    }
}
