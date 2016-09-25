<?php

namespace IPNVZLA\Http\Controllers;

use Illuminate\Http\Request;
use IPNVZLA\Http\Requests;
use IPNVZLA\Models\Medicos;
use IPNVZLA\Models\Especialidades;

class MedicosController extends Controller
{

    #Método que arma la vista para la gestion de especialidades
    public function index(){
    	$data['medicos'] = Medicos::all();
        $data['especialidades'] = Especialidades::all();
    	return view('medicos/index',compact('data'));
    }

    public function save(Request $request){
    	// Especialidades::create([ 'ESPECIALIDAD' => 'prueba' ]);
    	if($request->ajax()){
    		return $request->all();
    	}
    }

}