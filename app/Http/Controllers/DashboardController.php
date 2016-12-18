<?php

namespace IPNVZLA\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use IPNVZLA\Http\Requests;
use IPNVZLA\Models\Eventos;
use IPNVZLA\Models\Citas;
use IPNVZLA\Models\Medicos;

class DashboardController extends Controller
{
	// public function __construct(Request $request){
	// 	$this->middleware('admin',["only"=>["index"]]);
	// 	$this->middleware('super_user',["only"=>["especialidades"]]);
	// }

	#Método que arma la vista principal del dashboard para la gestión administrativa
	#de la página
    public function index(){
        $cls_citas = new Citas();
        $eventos = Eventos::where('FK_ESTATUS_EVENTO_ID','=',1)->take(5)->get();
        $data['citas'] = Citas::where('FK_ESTATUS_CITA_ID','=',1)->take(5)->get();
        $data['medicos'] = Medicos::all();
        $citas = $cls_citas->match_cita_medico($data);
        $data = $cls_citas->match_citas_eventos($citas,$eventos);
        return view('dashboard',compact('data'));
    }

    #Método que arma la vista para la gestion de especialidades
    public function especialidades(){
    	return view('administrativas/especialidades');
    }
}