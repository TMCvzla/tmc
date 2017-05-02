<?php

namespace App\Model\General;

use Illuminate\Database\Eloquent\Model;

class Configuracion extends Model
{
    protected $primaryKey = 'con_id';

    public static $rules = array(
        'con_id' => 'required',
        'con_nombre' => 'required',
        'con_codigo' => 'required',
        'con_valor' => 'required',
    );


    protected $table = 'configuraciones';
    protected $fillable = array(
        'con_id',
        'con_nombre',
        'con_codigo',
        'con_valor',
        'con_descripcion',
    );

}
