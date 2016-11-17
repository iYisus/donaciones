<?php

namespace IPNVZLA\Http\Controllers;
use Auth;
use Session;
use Redirect;
use PDOException;
use Illuminate\Http\Request;
use IPNVZLA\Http\Requests;
use IPNVZLA\Http\Requests\Login;
use IPNVZLA\User;
use Illuminate\Database\QueryException;
use Hash;	

class UsuarioController extends Controller
{
    	
	#Funcion para cargar vista de registro de usuario
	public function create(){
  		return view('usuario.crear_usuario');
		
	}

	#Funcion para cargar vista de perfil
	public function perfil(){
  		return view('usuario.perfil_usuario');
		
	}

	#Funcion para guardar un nuevo usuario
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


	#Funcion para iniciar sesion
	public function login(Login $request){
		try {
			if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
				return response()->json(['error' => '','estatus' => 200]);
			}else{
				return response()->json(['error' => "Datos incorrectos!" ,'estatus' => 404]);
			} 
		} catch (PDOException $e) {
			return response()->json(['error' => 'Algo ha ido mal, comunicarse con el administrador','estatus' => 500, "mensaje" => (string)$e ]);
		}
		catch (QueryException $e) {
			return response()->json(['error' => 'Algo ha ido mal, comunicarse con el administrador','estatus' => 500, "mensaje" => (string)$e ]);
		}
			
	
	}

	#Funcion para  cerrar sesion
	public function logout(){
		Auth::logout();
		return Redirect::to('/');
	}
}
