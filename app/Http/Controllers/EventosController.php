<?php

namespace IPNVZLA\Http\Controllers;

use Illuminate\Http\Request;
use IPNVZLA\Http\Requests;
use IPNVZLA\Models\Eventos;

class EventosController extends Controller
{

    public function __construct(Request $request){
        $this->middleware('admin');
    }
    
    #Método que arma la vista para la gestion de especialidades
    public function index(){  
    try {
            $cls_eventos = new Eventos();
            $data = Eventos::all();
            $enviar = $cls_eventos->order_eventos_archivados($data);
            if(count($enviar['archivar'])>0){
                $update = Eventos::where('ID','=',$enviar['archivar'])->update(['FK_ESTATUS_EVENTO_ID'=>2]);
                }
            return view('eventos/index',compact('enviar'));   
       } catch (Exception $e) {
           return ['estatus' => 500, 'data' => '', 'mensaje' => 'Ocurrió un error'];
       }       
       
    }
    
    public function modal(){
        if (request()->ajax()) {
            $view = view('eventos/view');
            $html = $view->render();
            return $html;
        }
    }

    public function save(Request $request){
        if (request()->ajax()) {
        	$cls_eventos = new Eventos();
            $cls_eventos->NOMBRE_EVENTO = $request['nombre'];
            $cls_eventos->FECHA_INICIO = $request['fecha_inicio'];
            $cls_eventos->FECHA_FIN = $request['fecha_fin'];
            $cls_eventos->DESCRIPCION = $request['descripcion'];
            $cls_eventos->save();
            if(isset($cls_eventos['id'])){
                $cls_eventos = new Eventos();
                $data['eventos'] = Eventos::all();
                $enviar = $cls_eventos->order_eventos_archivados($data['eventos']);
                $view = view('eventos/content_espera',compact('enviar'));
                $html = $view->render();
                return ['estatus' => 200, 'data' => $html, 'errors' => ''];
            } else {
                return ['estatus' => 500, 'data' => '', 'errors' => 'Ocurrió un error'];
            }
        }
    }

    public function search(Request $request){
        if (request()->ajax()) {
            $fecha = new Eventos;
            $data['evento'] = Eventos::find($request['evento']);
            $data['evento']["FECHA_INICIO"] = $fecha->dateMysql($data['evento']["FECHA_INICIO"]);
            $data['evento']["FECHA_FIN"] = $fecha->dateMysql($data['evento']["FECHA_FIN"]);
            $view = view('eventos/view',compact('data'));
            $html = $view->render();
            return $html;
        }
        
    }

    public function edit(Request $request){
        if (request()->ajax()) {
            $data['NOMBRE_EVENTO'] = $request['nombre'];
            $data['FECHA_INICIO'] = $request['fecha_inicio'];
            $data['FECHA_FIN'] = $request['fecha_fin'];
            $data['DESCRIPCION'] = $request['descripcion'];
            $update = Eventos::where('ID','=',$request['ID'])->update($data);
            if($update > 0) {
                $cls_eventos = new Eventos();
                $data = Eventos::all();
                $enviar = $cls_eventos->order_eventos_archivados($data);
                $view = view('eventos/content_espera',compact('enviar'));
                $html = $view->render();
                return ['estatus' => 200, 'data' => $html, 'errors' => ''];
            } else {
                return ['estatus' => 500, 'data' => '', 'errors' => 'Debe actualizar al menos un campo del formulario de eventos'];
            }
        }
    }

    public function edit_estatus(Request $request){
        if (request()->ajax()) {
            $data['FK_ESTATUS_EVENTO_ID'] = $request['estatus'];
            if ($data["FK_ESTATUS_EVENTO_ID"] == "true"){
                $update = Eventos::where('ID','=',$request['evento'])->delete();
            }else{
                $update = Eventos::where('ID','=',$request['evento'])->update($data);
            }
            if($update > 0) {
                return ['estatus' => 200, 'data' => $update, 'errors' => ''];
            } else {
                return ['estatus' => 404, 'data' => '', 'errors' => 'Ocurrió un error'];
            }
        }
    }

}