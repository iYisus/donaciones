<?php

namespace IPNVZLA\Http\Controllers;

use Illuminate\Http\Request;
use IPNVZLA\Http\Requests;
use IPNVZLA\Models\Especialidades;

class EspecialidadesController extends Controller
{

    #Método que arma la vista para la gestion de especialidades
    public function index(){
    	$data = Especialidades::all();
    	return view('especialidades/index',compact('data'));
    }

    public function save(Request $request){
    	Especialidades::create([ 'ESPECIALIDAD' => 'prueba' ]);
    	if($request->ajax()){
    		return $request->all();
    	}
    }

}