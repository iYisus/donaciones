<?php

namespace IPNVZLA\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use IPNVZLA\Http\Requests;
use IPNVZLA\Http\Requests\MailRequest;


class MailController extends Controller
{
    #Funcion para enviar correo
	public function sendMail(MailRequest $request){
		$mail = Mail::send('email.contact', $request->all(), function($msj)  use ($request){
			$msj->subject("Mensaje de contacto/sugerencia Instituto de Previsión del Niño");
			$msj->to('ipnvzla@gmail.com');
		});
	    if (Mail::failures()) {
	       return response()->json(['error' => Mail::failures(),'estatus' => 500]);
	    }
	    return response()->json(['error' =>'','estatus' => 200]);
		
	}
}
