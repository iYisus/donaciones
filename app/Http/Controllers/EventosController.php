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
        $data = Eventos::all();
        $data = $cls_eventos->order_eventos_archivados($data);
        if(count($data['archivar'])>0){
            $update = Eventos::where('ID','=',$data['archivar'])->update(['FK_ESTATUS_EVENTO_ID'=>2]);
        }
        return view('eventos/index',compact('data'));
    }
    
    public function modal(){
        $view = view('eventos/view');
        $html = $view->render();
        return $html;
    }

    public function save(Request $request){
    	$cls_eventos = new Eventos();
        $cls_eventos->NOMBRE_EVENTO = $request['nombre'];
        $cls_eventos->FECHA_INICIO = $request['fecha_inicio'];
        $cls_eventos->FECHA_FIN = $request['fecha_fin'];
        $cls_eventos->DESCRIPCION = $request['descripcion'];
        $cls_eventos->save();
        if(isset($cls_eventos['id'])){
            $cls_eventos = new Eventos();
            $data['eventos'] = Eventos::all();
            $data['eventos'] = $cls_eventos->order_eventos_archivados($data['eventos']);
            $view = view('eventos/content_espera',compact('data'));
            $html = $view->render();
            return ['estatus' => 200, 'data' => $html, 'errors' => ''];
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
            $cls_eventos = new Eventos();
            $data['eventos'] = Eventos::all();
            $data['eventos'] = $cls_eventos->order_eventos_archivados($data['eventos']);
            $view = view('eventos/content_espera',compact('data'));
            $html = $view->render();
            return ['estatus' => 200, 'data' => $html, 'errors' => ''];
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