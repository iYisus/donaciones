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
        $data['hoy'] = date('Y-m-d');
        $vencidas = Citas::whereRaw('FECHA_CITA < '.$data['hoy'].' and 
                                    FK_ESTATUS_CITA_ID = 1')->update(['FK_ESTATUS_CITA_ID'=>4]);
        $cls_medicos = new Medicos();
        $cls_citas = new Citas();
        $data['citas'] = $cls_citas->order_citas_fecha(Citas::where('FK_ESTATUS_CITA_ID','=',1)->get());
        $data['medicos'] = Medicos::all();
        $data['especialidades'] = Especialidades::where('FK_ESTATUS_ESPECIALIDAD_ID','=','1')->get();
        $data['medicos'] = $cls_medicos->order_data_index($data['medicos']);
    	return view('citas/index',compact('data'));
    }

    public function modal(){
        $data['especialidades'] = Especialidades::where('FK_ESTATUS_ESPECIALIDAD_ID','=','1')->get();
        $view = view('citas/modal',compact('data'));
        $html = $view->render();
        return $html;
    }

    public function edit(Request $request){
        $data['NOMBRE_PACIENTE'] = $request['pnombre'];
        $data['APELLIDO_PACIENTE'] = $request['papellido'];
        $data['EDAD_PACIENTE'] = $request['pedad'];
        $data['FECHA_CITA'] = $request['fecha'];
        $data['FK_ESPECIALIDAD_ID'] = $request['especialidad'];
        $data['FK_MEDICO_ID'] = $request['medico'];
        $update = Citas::where('ID','=',$request['ID'])->update($data);
        if($update > 0) {
            return ['estatus' => 200, 'data' => $update, 'errors' => ''];
        } else {
            return ['estatus' => 404, 'data' => '', 'errors' => 'Ocurrió un error'];
        }
    }

    public function view(Request $request){
        $cls_citas = new Citas();
        $data['citas'] = Citas::whereRaw('FK_ESTATUS_CITA_ID = 1 and 
                                    FK_ESPECIALIDAD_ID = '.$request["especialidad"])->get();
        $data['medicos'] = Medicos::all();
        $data['citas'] = $cls_citas->match_cita_medico($data);
        $view = view('citas/table',compact('data'));
        $html = $view->render();
        return $html;
    }

    public function search_medico(Request $request){
        $data['medicos'] = Medicos::where('FK_ESPECIALIDAD_ID','=',$request['especialidad'])->get();
        $view = view('citas/select_medicos',compact('data'));
        $html = $view->render();
        return $html;
    }

    public function save(Request $request){
        $data = new Citas;
        $data->NOMBRE_PACIENTE = $request['pnombre'];
        $data->APELLIDO_PACIENTE = $request['papellido'];
        $data->EDAD_PACIENTE = $request['pedad'];
        $data->FECHA_CITA = $request['fecha'];
        $data->FK_ESPECIALIDAD_ID = $request['especialidad'];
        $data->FK_MEDICO_ID = $request['medico'];
        $data->save();
        if(isset($data['id'])){
            return ['estatus' => 200, 'data' => $data['id'], 'errors' => ''];
        } else {
            return ['estatus' => 500, 'data' => '', 'errors' => 'Ocurrió un error'];
        }       
    }

    public function cancelar(Request $request){
        $data['FK_ESTATUS_CITA_ID'] = 3;
        $update = Citas::where('ID','=',$request['cita'])->update($data);
        if($update > 0) {
            return ['estatus' => 200, 'data' => $update, 'errors' => ''];
        } else {
            return ['estatus' => 404, 'data' => '', 'errors' => 'Ocurrió un error'];
        }
    }

    public function search_cita(Request $request){
        $data['cita'] = Citas::find($request['cita']);
        $data['especialidades'] = Especialidades::where('FK_ESTATUS_ESPECIALIDAD_ID','=','1')->get();
        $data['medicos'] = Medicos::where('FK_ESPECIALIDAD_ID','=',$data['cita']['FK_ESPECIALIDAD_ID'])->get();
        $view = view('citas/modal',compact('data'));
        $html = $view->render();
        return $html;
    }
}