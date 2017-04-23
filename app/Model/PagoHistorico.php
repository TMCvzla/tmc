<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PagoHistorico extends Model
{
    protected $primaryKey = 'pgh_id';

    public static $rules = array(
        'pgh_id' => 'required',
        'pag_id' => 'required',
        'pgh_columna' => 'required',
        'pgh_valor' => 'required',
        'usu_id' => 'required',
        'pgh_descripcion' => 'required',
    );


    protected $table = 'pagos_historicos';
    protected $fillable = array(
        'pgh_id',
        'pag_id',
        'pgh_columna',
        'pgh_valor',
        'usu_id',
        'pgh_descripcion');

    public function createPagoHistorico($objectId, $column, $value, $description)
    {
        $this->pag_id = $objectId;
        $this->pgh_columna = $column;
        $this->pgh_valor = $value;
        $this->usu_id = \Auth::user()->id;
        $this->pgh_descripcion = $description;
    }
}
