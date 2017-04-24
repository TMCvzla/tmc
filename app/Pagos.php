<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pagos extends Model
{
    public static $EST_FALLIDO = -1;
    public static $EST_PENDIENTE = 1;
    public static $EST_PORPROCESAR = 2;
    public static $EST_PROCESADOS = 3;
    public static $EST_FACTURADOS = 4;
    public static $EST_ANULADO = 5;
    public static $EST_ENEVALUACION = 6;
    public static $EST_CERRADO = 7;

    protected $primaryKey = 'pag_id';

    public static $rules = array(
        'pag_id' => 'required',
        'pag_monto' => 'required',
        'pag_concepto' => 'required|min:2',
        'pag_nombretc' => 'required',
        'pag_cith' => 'required',
        'usu_id' => 'required',
        'estatus' => 'required'
    );


    protected $table = 'pagos';
    protected $fillable = array('pag_id', 'monto', 'concepto', 'nombretc', 'cith', 'userid', 'fecha', 'estatus', 'cod_procesado', 'fecha_procesado');

    public static function findById($id)
    {

        $result = self::where('pag_id', $id)->first();

//        if (!is_null($result))
//        {
        return $result;
//        }

//        throw (new ModelNotFoundException())->setModel(Section::class);

    }
}
