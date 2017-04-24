<?php

namespace App\Model\General;

use Illuminate\Database\Eloquent\Model;

class ValorVariable extends Model
{
    protected $primaryKey = 'vva_id';

    public static $rules = array(
        'vva_id' => 'required',
        'vva_codigo' => 'required',
        'vva_valor' => 'required',
        'vva_orden' => 'required',
    );


    protected $table = 'valores_variables';
    protected $fillable = array(
        'vva_id',
        'vva_codigo',
        'vva_valor',
        'vva_orden',
        'vva_descripcion',
    );

}
