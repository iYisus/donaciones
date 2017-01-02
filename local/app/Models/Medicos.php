<?php

namespace IPNVZLA\Models;

use Illuminate\Database\Eloquent\Model;

class Medicos extends Model
{
    protected $table = 'medicos';

   	public $timestamps = false;

    public function order_data_index($data){
    	$response = [];
    	foreach ($data as $key => $value) {
    		if ( array_key_exists($value['FK_ESPECIALIDAD_ID'], $response) ){
    			$response[$value['FK_ESPECIALIDAD_ID']][$value['ID']] = $value;
    		} else {
    			$response[$value['FK_ESPECIALIDAD_ID']] = [$value['ID'] => $value];
    		}
    	}
    	return $response;
    }
}