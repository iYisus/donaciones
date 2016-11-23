<?php

namespace IPNVZLA\Http\Controllers;

use Illuminate\Http\Request;
use IPNVZLA\Http\Requests;
use IPNVZLA\Models\Medicos;
use IPNVZLA\Models\Citas;
use IPNVZLA\Models\Especialidades;

class CitasController extends Controller
{

    #Método que arma la vista para la gestion de especialidades
    public function index(){
        $cls_medicos = new Medicos();
        $cls_citas = new Citas();
        $data['citas'] = $cls_citas->order_citas_fecha(Citas::all());
    	$data['medicos'] = Medicos::all();
        $data['especialidades'] = Especialidades::where('FK_ESTATUS_ESPECIALIDAD_ID','=','1')->get();
        $data['medicos'] = $cls_medicos->order_data_index($data['medicos']);
    	return view('citas/index',compact('data'));
    }

    // public function save(Request $request){
    //     $cls_medicos = new Medicos();
    //     $cls_medicos->NOMBRE = $request['nombre'];
    //     $cls_medicos->APELLIDO = $request['apellido'];
    //     $cls_medicos->CEDULA = $request['cedula'];
    //     $cls_medicos->FK_ESPECIALIDAD_ID = $request['especialidad'];
    //     $cls_medicos->save();
    //     if(isset($cls_medicos['id'])){
    //         return ['estatus' => 200, 'data' => $cls_medicos['id'], 'errors' => ''];
    //     } else {
    //         return ['estatus' => 500, 'data' => '', 'errors' => 'Ocurrió un error'];
    //     }
    // }

    // public function edit(Request $request){
    //     // $posicion = isset($request['estatus']) ? 'FK_ESTATUS_ESPECIALIDAD_ID' : 'ESPECIALIDAD';
    //     // $valor = isset($request['estatus']) ? $request['estatus'] : $request['name'];   
    //     $update = Medicos::where('ID','=',$request['id'])->update(array('FK_ESTATUS_MEDICOS_ID'=>$request['estatus']));
    //     if($update > 0) {
    //         return ['estatus' => 200, 'data' => $update, 'errors' => ''];
    //     } else {
    //         return ['estatus' => 404, 'data' => '', 'errors' => 'Ocurrió un error'];
    //     }
    // }


}