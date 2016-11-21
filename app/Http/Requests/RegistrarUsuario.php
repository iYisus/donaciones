<?php

namespace IPNVZLA\Http\Requests;

use IPNVZLA\Http\Requests\Request;

class RegistrarUsuario extends Request
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
            "nombre" => "required|max:20|alpha",
            "apellido" => "required|max:20|alpha",
            "email" => "required|max:50|email|unique:users",
            "user_name" => "required|min:5|max:15|unique:users",
            "password" => "required|min:8|max:20",
            "passowrd_conf" => "required|min:8|max:20|same:password"
 
        ];
    }

    public function messages()
    {
        return [
            'passowrd_conf.required' => 'El campo confirmar contraseña es obligatorio.',
            'passowrd_conf.min' => 'El campo confirmar contraseña debe ser al menos de 8 caracteres.',
            'passowrd_conf.max' => 'confirmar contraseña no debe ser mayor que 20 caracteres.',
            'passowrd_conf.same' => 'Las contraseñas no son iguales.',
            'user_name.required' => 'El campo usuario  es obligatorio.',
            'user_name.min' => 'El campo usuario  debe ser al menos de 5 caracteres.',
            'user_name.max' => 'El campo usuario no debe ser mayor que 15 caracteres.',
            "email.unique" => "Correo electronico ya se encuentra en uso",
            "user_name.unique" => "Usuario ya se encuentra en uso",
        ];
    }  
}


 