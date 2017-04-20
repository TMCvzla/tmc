<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pagos extends Model
{
    public static $EST_PORPROCESAR = 1;
    public static $EST_PROCESADOS = 2;
    public static $EST_FACTURADOS = 3;

    protected $primaryKey = 'pagos_id';

    //
    public static $rules = array(
    'pagos_id'=>'required',
    'monto'=>'required',
    'concepto'=>'required|min:2',
    'nombretc'=>'required',
    'cith'=>'required',
    'userid'=>'required',
    'fecha'=>'required',
    'estatus'=>'required'
    );


    protected $table = 'pagos';
    protected $fillable = array('pagos_id', 'monto', 'concepto', 'nombretc', 'cith', 'userid', 'fecha', 'estatus', 'cod_procesado', 'fecha_procesado');

    public static function findById($id)
    {

        $result = self::where('pagos_id', $id)->first();

//        if (!is_null($result))
//        {
        return $result;
//        }

//        throw (new ModelNotFoundException())->setModel(Section::class);

    }
}
