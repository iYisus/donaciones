<?php

namespace IPNVZLA;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = ['id','nombre', 'apellido', 'user_name', 'email', 'password', 'fk_rol_id', '                  fk_estatus_usuario_id', 'estatus_registro'];
   

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

  
}
