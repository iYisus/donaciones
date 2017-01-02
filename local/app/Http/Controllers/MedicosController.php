<?php

namespace IPNVZLA\Http\Controllers;

use Illuminate\Http\Request;
use IPNVZLA\Http\Requests;
use IPNVZLA\Models\Medicos;
use IPNVZLA\Models\Especialidades;
use Yajra\Datatables\Datatables;
use DB;

class MedicosController extends Controller
{

    public function __construct(Request $request){
        $this->middleware('admin');
    }
    #Método que arma la vista para la gestion de especialidades
    public function index(){
        try {
             $data["especialidades"] = Especialidades::all();
            return view('medicos/index',compact('data'));
        } catch (Exception $e) {
            abort(500);
        }
       
    }

    public function save(Request $request){
        if (request()->ajax()) {
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
    }

    public function search(Request $request){
        if (request()->ajax()) {
            $data['medico'] = Medicos::find($request['medico']);
            $data['especialidades'] = Especialidades::all();
            $view = view('medicos/modal',compact('data'));
            $html = $view->render();
            return $html;    
        }
    }

    public function edit(Request $request){
    if (request()->ajax()) {
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

    public function tablaMedicos(){
        if (request()->ajax()) {
            $data = DB::table('medicos')
                ->join('especialidad', 'medicos.FK_ESPECIALIDAD_ID', '=', 'especialidad.ID')
                ->select(['medicos.ID','medicos.NOMBRE','medicos.APELLIDO','medicos.CEDULA','medicos.FK_ESTATUS_MEDICOS_ID','especialidad.ESPECIALIDAD']);
            return Datatables::of($data)->make(true);    
        }   
    }

    public function deleteMedico(Request $request){
         if (request()->ajax()) {
            try {
                 $delete = Medicos::where('ID',  $request->id)->delete();
                 if ($delete == true){
                    return ['estatus' => 200, 'data' => $delete, 'errors' => $delete];
                 }
                return ['estatus' => 500, 'data' => "", 'errors' => "No se pudo eliminar el médico"];
                 
            } catch (\Illuminate\Database\PDOException $e) {
                return ['estatus' => 500, 'data' => "", 'errors' => "No puedes elminar un médico asociado a una cita."];
            }catch (\Illuminate\Database\QueryException $e) {
                return ['estatus' => 500, 'data' => "", 'errors' => "No puedes elminar un médico asociado a una cita."];
            }
           
           
        }
    }


}