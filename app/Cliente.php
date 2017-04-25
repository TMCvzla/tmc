<?php

namespace App;

use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Auth\UserInterface;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{

    const CREATED_AT = 'cli_fechacreacion';
    const UPDATED_AT = 'cli_fechaactualizacion';

     public static $rules = array(
        'cli_nombre'=>'required|min:2|max:100',
        'usu_id'=>'required|min:1',
        'cli_ci'=>'required|min:2|max:15',
        'cli_email'=>'required|min:2|max:100',
        'cli_direccionfiscal'=>'required|min:2|max:500',
        'cli_direccionenvio'=>'required|min:2|max:500',
        'cli_banco'=>'required|min:1|max:100',
        'cli_nrocuenta'=>'required|min:2|max:50',
        'cli_tipocuenta'=>'required|min:1|max:20'
     );

    protected $primaryKey = 'cli_id';

    protected $table = 'clientes';

    protected $fillable = array(
        'cli_id',
        'usu_id',
        'cli_nombre',
        'cli_ci',
        'cli_email',
        'cli_direccionfiscal',
        'cli_direccionenvio',
        'cli_banco',
        'cli_nrocuenta',
        'cli_tipocuenta'
    );
     
}