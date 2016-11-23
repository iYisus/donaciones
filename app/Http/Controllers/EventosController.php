<?php

namespace IPNVZLA\Http\Controllers;

use Illuminate\Http\Request;
use IPNVZLA\Http\Requests;
use IPNVZLA\Models\Eventos;

class EventosController extends Controller
{

    #Método que arma la vista para la gestion de especialidades
    public function index(){         
        $cls_eventos = new Eventos();
        $data['eventos'] = Eventos::all();
        $data['eventos'] = $cls_eventos->order_eventos_archivados($data['eventos']);
        return view('eventos/index',compact('data'));
    }
    // $cls_medicos = new Medicos();
    //     $data['medicos'] = Medicos::all();
    //     $data['especialidades'] = Especialidades::all();
    //     $data['medicos'] = $cls_medicos->order_data_index($data['medicos']);
    //     return view('medicos/index',compact('data'));

    public function save(Request $request){
    	$cls_eventos = new Eventos();
        $cls_eventos->NOMBRE_EVENTO = $request['nombre'];
        $cls_eventos->FECHA_INICIO = $request['fecha_inicio'];
        $cls_eventos->FECHA_FIN = $request['fecha_fin'];
        $cls_eventos->DESCRIPCION = $request['descripcion'];
        $cls_eventos->save();
        if(isset($cls_eventos['id'])){
            return ['estatus' => 200, 'data' => $cls_eventos['id'], 'errors' => ''];
        } else {
            return ['estatus' => 500, 'data' => '', 'errors' => 'Ocurrió un error'];
        }
    }

    public function search(Request $request){
        $data['evento'] = Eventos::find($request['evento']);
        $view = view('eventos/view',compact('data'));
        $html = $view->render();
        return $html;
    }

    public function edit(Request $request){
        $data['NOMBRE_EVENTO'] = $request['nombre'];
        $data['FECHA_INICIO'] = $request['fecha_inicio'];
        $data['FECHA_FIN'] = $request['fecha_fin'];
        $data['DESCRIPCION'] = $request['descripcion'];
        $update = Eventos::where('ID','=',$request['ID'])->update($data);
        if($update > 0) {
            return ['estatus' => 200, 'data' => $update, 'errors' => ''];
        } else {
            return ['estatus' => 404, 'data' => '', 'errors' => 'Ocurrió un error'];
        }
    }

    public function edit_estatus(Request $request){
        $data['FK_ESTATUS_EVENTO_ID'] = $request['estatus'];
        $update = Eventos::where('ID','=',$request['evento'])->update($data);
        if($update > 0) {
            return ['estatus' => 200, 'data' => $update, 'errors' => ''];
        } else {
            return ['estatus' => 404, 'data' => '', 'errors' => 'Ocurrió un error'];
        }
    }

}