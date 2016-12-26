<?php

namespace IPNVZLA\Http\Controllers;

use Illuminate\Http\Request;
use IPNVZLA\Http\Requests;
use IPNVZLA\Models\Medicos;
use IPNVZLA\Models\Citas;
use IPNVZLA\Models\Especialidades;
use Yajra\Datatables\Datatables;
use DB;

class CitasController extends Controller

{

    public function __construct(Request $request){
        $this->middleware('admin');
    }

    #Método que arma la vista para la gestion de citas
    public function index(){
        try {
            $data['hoy'] = date('Y-m-d');
            $vencidas = DB::table("cita_medica")->where('FECHA_CITA','<', $data['hoy'])
                                                ->where('FK_ESTATUS_CITA_ID', '=', 1)->update(['FK_ESTATUS_CITA_ID'=> 2]);
            $data['especialidades'] = Especialidades::where('FK_ESTATUS_ESPECIALIDAD_ID','=','1')->get();
            return view('citas/index',compact('data'));
        } catch (Exception $e) {
            abort(500);
        }
        
    }

    public function modal(){
        if (request()->ajax()) {
            $data['especialidades'] = Especialidades::where('FK_ESTATUS_ESPECIALIDAD_ID','=','1')->get();
            $view = view('citas/modal',compact('data'));
            $html = $view->render();
            return $html;
        }
    }

    public function edit(Request $request){
        $citas = new Citas;
        $data['NOMBRE_PACIENTE'] = $request['pnombre'];
        $data['APELLIDO_PACIENTE'] = $request['papellido'];
        $data['FECHA_PACIENTE'] = $citas->dateMysql($request["fechap"]);
        $data['FECHA_CITA'] = $citas->dateMysql($request["fecha"]);
        $data['FK_ESPECIALIDAD_ID'] = $request['especialidad'];
        $data['FK_MEDICO_ID'] = $request['medico'];
        $data['FK_ESTATUS_CITA_ID'] = $request['estatus_cita'];
        $update = Citas::where('ID','=',$request['ID'])->update($data);
        if($update > 0) {
            return ['estatus' => 200, 'data' => $update, 'errors' => ''];
        } else {
            return ['estatus' => 404, 'data' => '', 'errors' => 'Ocurrió un error'];
        }
    }

    public function view(Request $request){
        if (request()->ajax()) {
            $cls_citas = new Citas();
            $data['citas'] = Citas::where('FECHA_CITA', '=', date('Y-m-d'))
                                  ->where('FK_ESTATUS_CITA_ID','=', 1)
                                  ->where('FK_ESPECIALIDAD_ID','=', $request["especialidad"])->get();
            $data['medicos'] = Medicos::all();
            $data['citas'] = $cls_citas->match_cita_medico($data);
            $view = view('citas/table',compact('data'));
            $html = $view->render();
            return $html;
        }
        
    }

    public function search_medico(Request $request){
        if (request()->ajax()) {
            $data['medicos'] = Medicos::where('FK_ESPECIALIDAD_ID','=',$request['especialidad'])->get();
            $view = view('citas/select_medicos',compact('data'));
            $html = $view->render();
            return $html;
        }
    }

    public function save(Request $request){
        $data = new Citas;
        $data->NOMBRE_PACIENTE = $request['pnombre'];
        $data->APELLIDO_PACIENTE = $request['papellido'];
        $data->FECHA_PACIENTE = $data->dateMysql($request["fechap"]);
        $data->FECHA_CITA = $data->dateMysql($request["fecha"]);
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
        if (request()->ajax()) {
            $data['FK_ESTATUS_CITA_ID'] = 3;
            $update = Citas::where('ID','=',$request['cita'])->update($data);
            if($update > 0) {
                return ['estatus' => 200, 'data' => $update, 'errors' => ''];
            } else {
                return ['estatus' => 404, 'data' => '', 'errors' => 'Ocurrió un error'];
            }
        }
    }

    public function search_cita(Request $request){
        $citas = new Citas;
        if (request()->ajax()) {
            $data['cita'] = Citas::find($request['cita']);
            $data["cita"]["FECHA_CITA"] = $citas->dateMysql($data["cita"]["FECHA_CITA"]);
            $data["cita"]["FECHA_PACIENTE"] = $citas->dateMysql($data["cita"]["FECHA_PACIENTE"]);
            $data['estatus'] = DB::table('estatus_cita')->get();
            $data['especialidades'] = Especialidades::where('FK_ESTATUS_ESPECIALIDAD_ID','=','1')->get();
            $data['medicos'] = Medicos::where('FK_ESPECIALIDAD_ID','=',$data['cita']['FK_ESPECIALIDAD_ID'])->get();
            $view = view('citas/modal',compact('data'));
            $html = $view->render();
            return $html;
        }
        
    }

    public function getCitas(Request $request){
    if (request()->ajax()) {
        $data = DB::table('cita_medica')
                ->join('especialidad', 'cita_medica.FK_ESPECIALIDAD_ID', '=', 'especialidad.ID')
                ->join('medicos', 'cita_medica.FK_MEDICO_ID', '=', 'medicos.ID')
                ->join('estatus_cita', 'cita_medica.FK_ESTATUS_CITA_ID', '=', 'estatus_cita.ID')
                ->select(['cita_medica.ID','cita_medica.NOMBRE_PACIENTE', 'cita_medica.APELLIDO_PACIENTE', 'cita_medica.FECHA_CITA', 'cita_medica.FECHA_PACIENTE', 'especialidad.ESPECIALIDAD', 'medicos.NOMBRE as NOMBRE_MEDICO', 'medicos.APELLIDO as APELLIDO_MEDICO', 'estatus_cita.DESCRIPCION']);
            return Datatables::of($data)->make(true); 
        }
        
    }

    public function deleteCita(Request $request){
            if (request()->ajax()) {
                $cita = Citas::where('ID',  $request->id)->delete();
                return response()->json(['estatus' => $cita]);
            }

    }
}