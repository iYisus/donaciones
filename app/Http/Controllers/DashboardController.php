<?php

namespace IPNVZLA\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use IPNVZLA\Http\Requests;

class DashboardController extends Controller
{
	// public function __construct(Request $request){
	// 	$this->middleware('admin',["only"=>["index"]]);
	// 	$this->middleware('super_user',["only"=>["especialidades"]]);
	// }

	#Método que arma la vista principal del dashboard para la gestión administrativa
	#de la página
    public function index(){
    	return view('dashboard');
    }

    #Método que arma la vista para la gestion de especialidades
    public function especialidades(){
    	return view('administrativas/especialidades');
    }
}