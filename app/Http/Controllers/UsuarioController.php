<?php

namespace IPNVZLA\Http\Controllers;

use Auth;
use Session;
use Redirect;
use PDOException;
use Illuminate\Http\Request;
use IPNVZLA\Http\Requests;
use IPNVZLA\Http\Requests\Login;
use IPNVZLA\Http\Requests\RegistrarUsuario;
use IPNVZLA\User;
use Illuminate\Database\QueryException;
use IPNVZLA\Http\Requests\MailRequest;
use IPNVZLA\Http\Requests\ModificarPerfil;
use Hash;    
use DateTime;
use Mail;

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

    #Funcion para cargar vista de recuperar contraseña
    public function password(){
        return view('usuario.recuperar_pass');
    }

    #Funcion para guardar un nuevo usuario
    public function store(RegistrarUsuario $request){
        try {
            $user = new User();
            $user->nombre = $request->nombre;
            $user->apellido = $request->apellido;
            $user->email = $request->email;
            $user->user_name = $request->user_name;
            $user->password = Hash::make($request->password);
            $user->save();        
            return view('usuario.crear_usuario',['estatus'=> 200, "mensaje" => 'Te has registrado exitosamente!, Bienvenido a IPN-Venezuela.']);
        } catch (QueryException $e) {
            return view('usuario.crear_usuario',['estatus'=> 500, "mensaje" => 'Ha ocurrido un error al registrarte!']);
        }
            
    }

    #Función para verificar email/modificar password
    public function verificarEmail(MailRequest $request){
        $user = User::where('email',$request->email)->first();
        if ($user){
            $string = $this->randString();
            $data = ["email"=> $request->email, "string" => $string];
            $send = $this->sendPassword($data);
            if ($send){
                $user->password = Hash::make($string);
                $user->save();
                return view('usuario.recuperar_pass', ['estatus' => 200, 'mensaje'=> "Se ha enviado un correo con las instrucciones."]);
            }
            return view('usuario.recuperar_pass', ['estatus' => 500, 'mensaje'=> "Falló al envíar correo, comunicarse con administrador."]);
        }
        return view('usuario.recuperar_pass', ['estatus' => 500, 'mensaje'=> "No se ha encontrado correo."]);
    }


    #Funcion para iniciar sesion
    public function login(Login $request){
        try {
            if (Auth::attempt(['user_name' => $request->user, 'password' => $request->password])) {
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

    #Funcion para generar random password
    public function randString(){
        $length = 18;
        $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $str = '';
        $max = mb_strlen($keyspace, '8bit') - 1;
        for ($i = 0; $i < $length; ++$i) {
            $str .= $keyspace[random_int(0, $max)];
        }
        return $str;
    }

    #Funcion para enviar password al correo
    public function sendPassword($data){
        $mail = Mail::send('email.password', $data, function($msj)  use ($data){
            $msj->subject("Recuperar contraseña. Instituto de Previsión del Niño");
            $msj->to($data["email"]);
        });
            if (Mail::failures()) {
               return false;
            }
        return true;
        
    }

    #Función para cargar la vista de ver/modificar perfil
    public function getPerfil(){
        return view('usuario.perfil_usuario');
    }

    #Función para actualzar información de usuario
    public function updateInfo(ModificarPerfil $request){
    try {
            $user = User::find(Auth::user()->id)->update($request->all());
            return redirect('/perfil')->with('estatus',200)->with( "mensaje", 'Has actualizado tu información éxitosamente.');
        } catch (QueryException $e) {
            return view('usuario.perfil_usuario',['estatus'=> 500, "mensaje" => 'Ha ocurrido un error al modificar la información!']);
        }
            
    }

    #Función para actualizar contraseña
    public function updatePassword(ModificarPerfil $request){
        try {
            $user = User::find(Auth::user()->id);
            if (Hash::check($request->password, $user->password)) {
                $user->fill([
                    'password' => Hash::make($request->password_conf)
                ])->save();
                return view('usuario.perfil_usuario',['estatus'=> 200, "mensaje" => 'Tu  					   contraseña se ha modificado éxitosamente!.']);
            } 
        return view('usuario.perfil_usuario',['estatus'=> 500, "mensaje" => 'Tu  					   contraseña actual es incorrecta!.']);     
        }
        catch (QueryException $e) {
            return view('UsuarioController@getPerfil',['estatus'=> 500, "mensaje" => 'Ha ocurrido un error al modificar la información!']);
        }
            
    }
        

    #Funcion para actualizar email
    public function updateEmail(ModificarPerfil $request){
	try {
            if($request->correo_actual == Auth::user()->email){
            	$user = User::find(Auth::user()->id)->update(['email' => $request->confirmar_email]);
            	return view('usuario.perfil_usuario',['estatus'=> 200, "mensaje" => 'Tu  					   correo se ha modificado éxitosamente!.']);
            }
        return view('usuario.perfil_usuario',['estatus'=> 500, "mensaje" => 'Tu correo actual es 
        									 incorrecto!.']);
        }
        catch (QueryException $e) {
            return view('UsuarioController@getPerfil',['estatus'=> 500, "mensaje" => 'Ha ocurrido un error al modificar la información!']);
        }

    }

}
