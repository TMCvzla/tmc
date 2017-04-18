<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;
//class Clientes extends Model
/*{
    //
    protected $table = "clientes"
}
*/

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent\Model;
 
//class Clientes extends Eloquent implements UserInterface, RemindableInterface {
class Clientes extends Model {

 public static $rules = array(
    'nombre'=>'required|min:2',
    'ci'=>'required|min:2',
    'enail'=>'required|min:2',
    'userid'=>'required|min:1',
    'dirfiscal'=>'required|min:2',
    'direnvio'=>'required|min:2',
    'banco'=>'required|min:1',
    'cuenta'=>'required|min:2',
    'tipocuenta'=>'required|min:1'
    );


    protected $table = 'clientes';
    protected $fillable = array('clienteid','nombre','ci','email','userid','dirfiscal','direnvio', 'banco','cuenta','tipocuenta');
     
}