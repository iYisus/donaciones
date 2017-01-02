<?php

namespace IPNVZLA\Http\Controllers;

use Illuminate\Http\Request;
use IPNVZLA\Http\Requests;
use IPNVZLA\Models\Especialidades;
use Yajra\Datatables\Datatables;


class EspecialidadesController extends Controller
{

    public function __construct(Request $request){
        $this->middleware('admin');
    }
    
    #Método que arma la vista para la gestion de especialidades
    public function index(){
        try {
            $data = Especialidades::all();
            return view('especialidades/index',compact('data'));
        } catch (Exception $e) {
            abort(500);
        }
    	
    }

    public function save(Request $request){
        if (request()->ajax()) {
            $data = new Especialidades;
            $data->ESPECIALIDAD = $request['ESPECIALIDAD'];
            $data->save();
            if(isset($data['id'])){
                $data = Especialidades::all();
                $view = view('especialidades/content',compact('data'));
                $html = $view->render();
                return ['estatus' => 200, 'data' => $html, 'errors' => ''];
            } else {
                return ['estatus' => 500, 'data' => '', 'errors' => 'Ocurrió un error'];
            }
        }
    }

    public function edit(Request $request){
    if (request()->ajax()) {
            $posicion = isset($request['estatus']) ? 'FK_ESTATUS_ESPECIALIDAD_ID' : 'ESPECIALIDAD';
            $valor = isset($request['estatus']) ? $request['estatus'] : $request['name'];   
            $update = Especialidades::where('ID','=',$request['id'])->update(array($posicion=>$valor));
            if($update > 0) {
                $data = Especialidades::all();
                $view = view('especialidades/content',compact('data'));
                $html = $view->render();
                return ['estatus' => 200, 'data' => $html, 'errors' => ''];
            } else {
                return ['estatus' => 404, 'data' => '', 'errors' => 'Ocurrió un error'];
            }
        }
    }

    public function deleEspecialidad(Request $request){
         if (request()->ajax()) {
            try {
                 $delete = Especialidades::where('ID',  $request->id)->delete();
                 $data = Especialidades::all();
                 $view = view('especialidades/content',compact('data'));
                 $html = $view->render();
                 if ($delete == true){
                    return ['estatus' => 200, 'data' => $html, 'errors' => $delete];
                 }
                return ['estatus' => 500, 'data' => $html, 'errors' => "No se pudo eliminar la especialidad"];
                 
            } catch (\Illuminate\Database\PDOException $e) {
                return ['estatus' => 500, 'data' => "", 'errors' => "No puedes elminar una especialidad asociada a un médico/cita."];
            }catch (\Illuminate\Database\QueryException $e) {
                return ['estatus' => 500, 'data' => "", 'errors' => "No puedes elminar una especialidad asociada a un médico/cita."];
            }
           
           
        }
    }

}