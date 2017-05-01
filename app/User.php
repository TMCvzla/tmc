<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    const CREATED_AT = 'usu_fechacreacion';
    const UPDATED_AT = 'usu_fechaactualizacion';

    public static $EST_ACTIVO = 1;
    public static $EST_INACTIVO = 2;
    public static $EST_REINICIADO = 3;

    protected $primaryKey = 'usu_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'usu_estatus', 'usu_nombre', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
