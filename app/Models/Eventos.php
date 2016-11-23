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
        $response = [];
    	foreach ($data as $key => $value) {
    		if ( array_key_exists($value['FK_ESTATUS_EVENTO_ID'], $response) ){
    			$response[$value['FK_ESTATUS_EVENTO_ID']][$value['ID']] = $value;
    		} else {
    			$response[$value['FK_ESTATUS_EVENTO_ID']] = [$value['ID'] => $value];
    		}
    	}
        return $response;
    }
}