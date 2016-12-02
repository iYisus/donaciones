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
                "nombre" => "required|max:20",
                "email" => "required|max:50|email",
                "mensaje_email" => "required|max:350",
            ];
        }else{
            $rules  =  [
                "email" => "required|max:50|email",
            ];
        }

        return $rules;
        
    }

}
