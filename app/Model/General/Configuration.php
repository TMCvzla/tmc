<?php

namespace App\Model\General;

use Illuminate\Database\Eloquent\Model;

class Configuration extends Model
{
    const CREATED_AT = 'con_createdat';
    const UPDATED_AT = 'con_updatedat';

    protected $primaryKey = 'con_id';

    public static $rules = array(
        'con_id' => 'required',
        'con_name' => 'required',
        'con_code' => 'required',
        'con_value' => 'required',
    );


    protected $table = 'configurations';
    protected $fillable = array(
        'con_id',
        'con_name',
        'con_code',
        'con_value',
        'con_description',
    );

    public function getByCode($code){

        $result = self::where('con_code', $code)->first();

        if (!is_null($result)){
            return $result;
        }

        return null;
//        throw (new ModelNotFoundException())->setModel(Section::class);

    }
}
