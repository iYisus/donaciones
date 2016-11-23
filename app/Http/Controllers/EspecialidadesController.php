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
        $data = new Especialidades;
        $data->ESPECIALIDAD = $request['ESPECIALIDAD'];
        $data->save();
        if(isset($data['id'])){
            return ['estatus' => 200, 'data' => $data['id'], 'errors' => ''];
        } else {
            return ['estatus' => 500, 'data' => '', 'errors' => 'Ocurrió un error'];
        }
    }

    public function edit(Request $request){
        $posicion = isset($request['estatus']) ? 'FK_ESTATUS_ESPECIALIDAD_ID' : 'ESPECIALIDAD';
        $valor = isset($request['estatus']) ? $request['estatus'] : $request['name'];   
        $update = Especialidades::where('ID','=',$request['id'])->update(array($posicion=>$valor));
        if($update > 0) {
            return ['estatus' => 200, 'data' => $update, 'errors' => ''];
        } else {
            return ['estatus' => 404, 'data' => '', 'errors' => 'Ocurrió un error'];
        }
    }

}