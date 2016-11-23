<?php

namespace IPNVZLA\Models;

use Illuminate\Database\Eloquent\Model;

class Citas extends Model
{
	
    protected $table = 'cita_medica';

    public $timestamps = false;

    protected $fillable = ['NOMBRE_PACIENTE,APELLIDO_PACIENTE,EDAD_PACIENTE,FECHA_CITA,
    						FK_ESPECIALIDAD_ID,FK_MEDICO_ID,FK_ESTATUS_CITA_ID'];

    public function order_citas_fecha($citas){
        $hoy = date('Y-m-d');
        $response = [];
        foreach ($citas as $key => $value) {
            $llave = $value['FECHA_CITA'] == $hoy ? 'hoy' : 'proximas';
            if ( array_key_exists($value[$llave]['FK_ESPECIALIDAD_ID'], $response) ){
                $response[$llave][$value['FK_ESPECIALIDAD_ID']][$value['ID']] = $value;
            } else {
                $response[$llave][$value['FK_ESPECIALIDAD_ID']] = [$value['ID'] => $value];
            }
        }
        return $response;
    }
}