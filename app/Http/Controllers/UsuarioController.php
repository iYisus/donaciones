<?php

namespace IPNVZLA\Http\Controllers;
use Auth;
use Session;
use Redirect;
use Illuminate\Http\Request;
use IPNVZLA\Http\Requests;
use IPNVZLA\Http\Requests\UsuarioRequest;
use IPNVZLA\User;
use Illuminate\Database\QueryException;
use Hash;	

class UsuarioController extends Controller
{
    	

	public function create(){
  			 return view('usuario.crear_usuario');
		
		
	}

	public function store(Request $request){
			$user = new User();
			$user->nombre = $request->nombre;
			$user->apellido = $request->apellido;
			$user->email = $request->email;
			$user->user_name = $request->user_name;
			$user->password = Hash::make($request->password);
			$user->save();		
			return redirect('usuario/create')->with('insert_200','Te has registrado exitosamente!, Bienvenido a IPN-Venezuela.');

		
			
	}

	public function login(Request $request){	
		if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
				return Redirect::to('/');
		}else{
			return "nope";

		} 
	
	}


	public function logout(){
		Auth::logout();
		return Redirect::to('/');
	}
}
