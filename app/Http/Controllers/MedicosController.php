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
        $cls_medicos = new Medicos();
    	$data['medicos'] = Medicos::all();
        $data['especialidades'] = Especialidades::all();
        $data['medicos'] = $cls_medicos->order_data_index($data['medicos']);
    	return view('medicos/index',compact('data'));
    }

    public function save(Request $request){
        $search = Medicos::where('CEDULA','=',$request['cedula'])->get();
        if(count($search)>0){
            return ['estatus' => 500, 'data' => '', 'errors' => 'Ya existe un médico registrado con el mismo número de cédula'];
        } else {
            $cls_medicos = new Medicos();
            $cls_medicos->NOMBRE = $request['nombre'];
            $cls_medicos->APELLIDO = $request['apellido'];
            $cls_medicos->CEDULA = $request['cedula'];
            $cls_medicos->FK_ESPECIALIDAD_ID = $request['especialidad'];
            $cls_medicos->save();
            if(isset($cls_medicos['id'])){
                return ['estatus' => 200, 'data' => $cls_medicos['id'], 'errors' => ''];
            } else {
                return ['estatus' => 500, 'data' => '', 'errors' => 'Ocurrió un error'];
            }
        }
    }

    public function search(Request $request){
        $data['medico'] = Medicos::find($request['medico']);
        $data['especialidades'] = Especialidades::all();
        $view = view('medicos/modal',compact('data'));
        $html = $view->render();
        return $html;    
    }

    public function edit(Request $request){
        if(isset($request['estatus'])){
            $data['FK_ESTATUS_MEDICOS_ID'] = $request['estatus'];
        } else {    
            $data['NOMBRE'] = $request['nombre'];
            $data['APELLIDO'] = $request['apellido'];
            $data['CEDULA'] = $request['cedula'];
            $data['FK_ESPECIALIDAD_ID'] = $request['especialidad'];
        }
        $update = Medicos::where('ID','=',$request['id'])->update($data);
        if($update > 0) {
            return ['estatus' => 200, 'data' => $update, 'errors' => ''];
        } else {
            return ['estatus' => 404, 'data' => '', 'errors' => 'Ocurrió un error'];
        }
    }


}