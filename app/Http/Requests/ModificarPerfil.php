<?php

namespace IPNVZLA\Http\Requests;

use IPNVZLA\Http\Requests\Request;

class ModificarPerfil extends Request
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
         if($this->input("info")){
                $rules  =  [
                    "nombre" => "required|min:3|max:20",
                    "apellido" => "required|min:3|max:20",
                ];
            }   
        if($this->input("pass")){
                $rules  =  [
                    "password" => "required|min:8|max:20",
                    "password_nueva" => "required|min:8|max:20",
                    "password_conf" => "required|min:8|max:20|same:password_nueva"
                ];
            }  
        if($this->input("correo")){
                $rules  =  [
                    "correo_actual" => "required|max:50|email",
                    "email" => "required|max:50|email|unique:users",
                    "confirmar_email" => "required|max:50|email|same:email",
                ];
            }    

        return $rules;
    }

    public function messages()
    {
        return [
            'password_conf.required' => 'El campo confirmar contraseña es obligatorio.',
            'password_conf.min' => 'El campo confirmar contraseña debe ser al menos de 8 caracteres.',
            'password_conf.max' => 'confirmar contraseña no debe ser mayor que 20 caracteres.',
            'password_conf.same' => 'Las contraseñas no son iguales.',
            'password_nueva.required' => 'El campo  contraseña nueva es obligatorio.',
            'password_nueva.min' => 'El campo  contraseña nueva debe ser al menos de 8 caracteres.',
            'password_nueva.max' => 'contraseña nueva no debe ser mayor que 20 caracteres.',
            'password.required' => 'El campo  contraseña es obligatorio.',
            'password.min' => 'El campo  contraseña debe ser al menos de 8 caracteres.',
            'password.max' => 'contraseña no debe ser mayor que 20 caracteres.',
        ];
    } 
}
