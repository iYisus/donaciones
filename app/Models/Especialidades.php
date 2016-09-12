<?php

namespace IPNVZLA\Models;

use Illuminate\Database\Eloquent\Model;

class Especialidades extends Model
{
    protected $table = 'especialidad';

    protected $fillable = ['ESPECIALIDAD,FK_ESTATUS_ESPECIALIDAD_ID'];
}