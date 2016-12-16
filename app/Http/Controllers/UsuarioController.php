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
use Yajra\Datatables\Datatables;
use Hash;    
use DateTime;
use Mail;
use DB;

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

    #Funcion para cargar vista de usuarios
    public function getUsuarios(){
        return view('usuario.usuarios');
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
            return view('usuario.crear_usuario',['estatus'=> 200, "mensaje" => trans('texto.usuario_registrado')]);
        } catch (QueryException $e) {
            return view('usuario.crear_usuario',['estatus'=> 500, "mensaje" => trans('texto.error')]);
        }
        catch (PDOException $e) {
            return view('usuario.crear_usuario',['estatus'=> 500, "mensaje" => trans('texto.error')]);
        }
        catch (Exception $e) {
            return view('usuario.crear_usuario',['estatus'=> 500, "mensaje" => trans('texto.error')]);
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
                return view('usuario.recuperar_pass', ['estatus' => 200, 'mensaje'=> trans('texto.correo_enviado')]);
            }
            return view('usuario.recuperar_pass', ['estatus' => 500, 'mensaje'=> trans('texto.correo_fallo')]);
        }
        return view('usuario.recuperar_pass', ['estatus' => 500, 'mensaje'=> trans('texto.correo_no_encontrado')]);
    }


    #Funcion para iniciar sesion
    public function login(Login $request){
        try {
            if (Auth::attempt(['user_name' => $request->user_name, 'password' => $request->password])) {
                return response()->json(['error' => '','estatus' => 200]);
            }else{
                return response()->json(['error' => trans('texto.usuario_incorrecto') ,'estatus' => 404]);
            } 
        } catch (PDOException $e) {
            return response()->json(['error' => trans('texto.error'),'estatus' => 500, "mensaje" => trans('texto.error') ]);
        }
        catch (QueryException $e) {
            return response()->json(['error' => trans('texto.error'),'estatus' => 500, "mensaje" => trans('texto.error')]);
        }
        catch (Exception $e) {
            return view('usuario.crear_usuario',['estatus'=> 500, "mensaje" => trans('texto.error')]);
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
            $msj->subject(trans('texto.password_reset'));
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
            return redirect('/perfil')->with('estatus',200)->with( "mensaje", trans('texto.modifcar_info'));
        } catch (QueryException $e) {
            return view('usuario.perfil_usuario',['estatus'=> 500, "mensaje" => trans('texto.error')]);
        }
        catch (Exception $e) {
            return view('usuario.perfil_usuario',['estatus'=> 500, "mensaje" => trans('texto.error')]);
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
                return view('usuario.perfil_usuario',['estatus'=> 200, "mensaje" => trans('texto.password_update')]);
            } 
        return view('usuario.perfil_usuario',['estatus'=> 500, "mensaje" => trans('texto.current_password')]);     
        }
        catch (QueryException $e) {
            return view('usuario.perfil_usuario',['estatus'=> 500, "mensaje" => trans('texto.error')]);
        }
        catch (Exception $e) {
            return view('usuario.perfil_usuario',['estatus'=> 500, "mensaje" => trans('texto.error')]);
        }
            
    }
        

    #Funcion para actualizar email
    public function updateEmail(ModificarPerfil $request){
	try {
            if($request->correo_actual == Auth::user()->email){
            	$user = User::find(Auth::user()->id)->update(['email' => $request->confirmar_email]);
            	return view('usuario.perfil_usuario',['estatus'=> 200, "mensaje" => trans('texto.correo_update')]);
            }
        return view('usuario.perfil_usuario',['estatus'=> 500, "mensaje" => trans('texto.current_email')]);
        }
        catch (QueryException $e) {
            return view('usuario.perfil_usuario',['estatus'=> 500, "mensaje" => trans('texto.error')]);
        }
        catch (Exception $e) {
            return view('usuario.perfil_usuario',['estatus'=> 500, "mensaje" => trans('texto.error')]);
        }

    }

    #Funcion para obtener usuarios
    public function obtenerUsuarios(){
        if (request()->ajax()) {
            $data = DB::table('users')
                    ->join('roles', 'users.FK_ROL_ID', '=', 'roles.ID')
                    ->select(['users.id','users.FK_ESTATUS_USUARIO_ID','users.nombre','users.apellido','users.user_name','roles.DESCRIPCION'])->
                    where('users.id', '!=', Auth::id());
            return Datatables::of($data)->make(true);
        }

    }

}
