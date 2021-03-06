<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    const CREATED_AT = 'pag_fechacreacion';
    const UPDATED_AT = 'pag_fechaactualizacion';

    public static $rules = array(
        'usu_id' => 'required|min:1',
        'pag_estatus' => 'required|min:1|max:20',
        'pag_monto' => 'required|numeric|between:100,500000',
        'pag_concepto' => 'required|min:2|max:100',
        'pag_nombretc' => 'required|min:2|max:100',
        'pag_cith' => 'required|min:2|max:20',
    );
    
    public static $EST_FALLIDO = -1;
    public static $EST_PENDIENTE = 1;
    public static $EST_PORCONCILIAR = 2;
    public static $EST_CONCILIADO = 3;
    public static $EST_PROCESADO = 4;
    public static $EST_FACTURADO = 5;
    public static $EST_ANULADO = 6;
    public static $EST_ENEVALUACION = 7;
    public static $EST_CERRADO = 8;

    protected $primaryKey = 'pag_id';

    protected $table = 'pagos';

    protected $fillable = array(
        'pag_id',
        'usu_id',
        'pag_estatus',
        'pag_monto',
//        'pag_porcentajecomision',
        'pag_montocomision',
        'pag_montoimpuesto',
        'pag_montocomisiontmc',
        'pag_montocomisionpasarela',
        'pag_montototalcliente',
        'pag_concepto',
        'pag_nombretc',
        'pag_cith',
        'pag_codigoconciliacion',
        'pag_codigoprocesado',
        'pag_fechacreacion',
        'pag_fechaactualizacion'
    );

//    public static function findById($id)
//    {
//        $result = self::where('pag_id', $id)->first();
//        if (!is_null($result)){
//            return $result;
//        }
//        throw (new ModelNotFoundException())->setModel(Section::class);
//
//    }

    public static function getMontosArray($monto)
    {
        /*Configuraciones que deben consultarse en BD*/
        $porcentajeGanancia = 0.3;
        $porcentajeImpuesto = 0.12;
        $porcentajePasarela = 0.077;

        $result = Array();

        $porcentajeGanancia = $porcentajePasarela + ($porcentajePasarela * $porcentajeGanancia);
        $porcentajeImpuestoCalc = $porcentajeGanancia * $porcentajeImpuesto;
        $porcentajeComision = $porcentajeGanancia + $porcentajeImpuestoCalc;
        $porcentajeTmc = $porcentajeComision - $porcentajePasarela - $porcentajeImpuestoCalc;

        $montoTransaccion = $monto;
        $montoComision = $montoTransaccion * $porcentajeComision;
        $montoComisionTmc = $montoTransaccion * $porcentajeTmc;
        $montoComisionPasarela = $montoTransaccion * $porcentajePasarela;
        $montoImpuesto = ($montoComisionTmc + $montoComisionPasarela) * $porcentajeImpuesto;
        $montoTotalCliente = $montoTransaccion - $montoComision;

        $result['montoTransaccion'] = $monto;
        $result['montoComision'] = $montoComision;
        $result['montoComisionTmc'] = $montoComisionTmc;
        $result['montoComisionPasarela'] = $montoComisionPasarela;
        $result['montoImpuesto'] = $montoImpuesto;
        $result['montoTotalCliente'] = $montoTotalCliente;

        return $result;
    }
}
