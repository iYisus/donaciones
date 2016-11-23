<?php

namespace IPNVZLA\Http\Requests;

use IPNVZLA\Http\Requests\Request;

class MailRequest extends Request
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
       
        if(count($this->all()) >=3){
            $rules  =  [
                "nombre_email" => "required|max:20",
                "email_send" => "required|max:50|email",
                "mensaje_email" => "required|max:350",
            ];
        }else{
            $rules  =  [
                "email_send" => "required|max:50|email",
            ];
        }

        return $rules;
        
    }

    public function messages()
    {
        return [
            'nombre_email.required' => 'El campo nombre es obligatorio.',
            'email_send.required' => 'El campo email es obligatorio.',
            'email_send.email' => 'Corre invalido.',
            'mensaje_email.required' => 'El campo mensaje es obligatorio.',
            'nombre_email.max' => 'nombre no debe ser mayor a 20 caracteres.',
            'email_send.max' => 'email no debe ser mayor a 50 caracteres.',
            'mensaje_email.max' => 'mensaje no debe ser mayor a 350 caracteres.',

        ];
    }
}
