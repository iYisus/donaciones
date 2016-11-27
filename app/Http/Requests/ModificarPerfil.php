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

}
