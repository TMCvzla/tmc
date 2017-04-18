<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pagos extends Model
{
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
    protected $fillable = array('pagos_id','monto','concepto','nombretc','cith','userid','fecha','estatus');
}
