<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PagoHistorico extends Model
{
    const CREATED_AT = 'pgh_fechacreacion';
    const UPDATED_AT = 'pgh_fechaactualizacion';

    public static $rules = array(
        'pag_id' => 'required',
        'pgh_columna' => 'required',
        'pgh_valor' => 'required',
        'usu_id' => 'required',
        'pgh_descripcion' => 'required',
    );

    protected $primaryKey = 'pgh_id';

    protected $table = 'pagos_historicos';

    protected $fillable = array(
        'pgh_id',
        'pag_id',
        'pgh_columna',
        'pgh_valor',
        'usu_id',
        'pgh_descripcion'
    );
    
}
