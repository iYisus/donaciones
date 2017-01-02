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

}


 