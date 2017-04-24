<?php

namespace App;

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent\Model;
 
class Clientes extends Model {

    protected $primaryKey = 'cli_id';

     public static $rules = array(
        'cli_nombre'=>'required|min:2',
        'cli_ci'=>'required|min:2',
        'cli_email'=>'required|min:2',
        'usu_id'=>'required|min:1',
        'cli_direccionfiscal'=>'required|min:2',
        'cli_direccionenvio'=>'required|min:2',
        'cli_banco'=>'required|min:1',
        'cli_nrocuenta'=>'required|min:2',
        'cli_tipocuenta'=>'required|min:1'
     );

    protected $table = 'clientes';
    protected $fillable = array(
        'cli_id',
        'cli_nombre',
        'cli_ci',
        'cli_email',
        'usu_id',
        'cli_direccionfiscal',
        'cli_direccionenvio',
        'cli_banco',
        'cli_nrocuenta',
        'cli_tipocuenta'
    );
     
}