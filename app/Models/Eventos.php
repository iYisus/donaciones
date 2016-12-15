<?php

namespace IPNVZLA\Models;

use Illuminate\Database\Eloquent\Model;

class Eventos extends Model
{
	
    protected $table = 'eventos';

    public $timestamps = false;

    protected $fillable = ['NOMBRE_EVENTO,DESCRIPCION,FECHA_INICIO,FECHA_FIN,
    						FK_ESTATUS_EVENTO_ID,ESTATUS_REGISTRO'];

    public function order_eventos_archivados($data){
        $response = ['eventos'=>[],'archivar'=>[]];
        $hoy = date('Y-m-d');
    	foreach ($data as $key => $value) {
            if($hoy > $value['FECHA_FIN'] && $value['FK_ESTATUS_EVENTO_ID']==1){
                array_push($response['archivar'], $value['ID']);
                $value['FK_ESTATUS_EVENTO_ID'] = 2;
            }
    		if ( array_key_exists($value['FK_ESTATUS_EVENTO_ID'], $response['eventos']) ){
    			$response['eventos'][$value['FK_ESTATUS_EVENTO_ID']][$value['ID']] = $value;
    		} else {
    			$response['eventos'][$value['FK_ESTATUS_EVENTO_ID']] = [$value['ID'] => $value];
    		}
    	}
        return $response;
    }
}