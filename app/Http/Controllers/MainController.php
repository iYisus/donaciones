<?php

namespace IPNVZLA\Http\Controllers;

use Illuminate\Http\Request;
use IPNVZLA\Http\Requests;
use IPNVZLA\Models\Eventos;

class MainController extends Controller
{
    public function index(){
    	$eventos = Eventos::orderby('FECHA_INICIO', 'desc')->where('FK_ESTATUS_EVENTO_ID', '=', 1)->take(3)->get();
    	return view('index',array("eventos"=>$eventos));
    }

    public function buscarEvento(Request $request){
    	if (request()->ajax()) {
    	   $eventos = Eventos::find($request->id); 
    	   if ($eventos){
    	   	  $view = view('eventos/modalEventos',compact('eventos'));
              $html = $view->render();
           	  return  response()->json(['estatus' => 200, "data" => $html]); 
    	   }
          return  response()->json(['estatus' => 500, "data" => trans('texto.error')]); 
        }

    }
}
