<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Model\PagoHistorico;
use App\Pago;
use Illuminate\Http\Request;

class PagoController extends Controller
{
    /**
     * Display a listing of transaction by Status
     *
     * @return \Illuminate\Http\Response
     */
    public function index($estatus)
    {
        $sql =
            ' SELECT pag_id, pag_concepto, pag_nombretc, pag_fechacreacion, pag_monto ' .
            ' FROM pagos ' .
            ' WHERE usu_id = ' . (\Auth::user()->id) .
            ' AND pag_estatus = ' . $estatus .
            ' ORDER BY pag_fechacreacion DESC';
        $listado = \DB::select($sql);

        return view('transactions', ['data' => $listado]);
    }

    /**
     * Display a listing of transaction to Process
     *
     * @return \Illuminate\Http\Response
     */
    public function toProcess()
    {
        $sql =
            ' SELECT * ' .
            ' FROM pagos ' .
            ' WHERE pag_estatus = ' . Pago::$EST_PORPROCESAR .
            ' ORDER BY pag_fechacreacion ASC';
        $listado = \DB::select($sql);

        return view('process', ['data' => $listado]);
    }


    /**
     * Process a payment
     *
     * @return \Illuminate\Http\Response
     */
    public function process(Request $request)
    {
        $this->validate($request,[
            'pag_codigoprocesado' => 'required|unique:pagos|max:100',
            'pag_id' => 'required',
        ]);

        $object = Pago::find($request->pag_id);

        $object->pag_estatus = Pago::$EST_PROCESADOS;
        $object->pag_codigoprocesado = $request->pag_codigoprocesado;
        $object->save();

        $pgh = PagoHistorico::create([
            'pag_id' => $object->pag_id,
            'pgh_columna' => 'pag_estatus',
            'pgh_valor' => $object->pag_estatus,
            'usu_id' => \Auth::user()->id,
            'pgh_descripcion' => $object->pag_codigoprocesado,
        ]);

        \Session::flash('alert-success', 'Pago ' . $request->pag_codigoprocesado . ' procesado satisfactoriamente.');

        return redirect('toProcess');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Save the payment to audit
        $payment = Pago::create([
            'usu_id' => \Auth::user()->id,
            'pag_estatus' => Pago::$EST_PENDIENTE,
            'pag_monto' => $request->monto,
            'pag_concepto' => $request->concepto,
            'pag_nombretc' => $request->nombretc,
            'pag_cith' => $request->cipre . $request->cith,
        ]);

        $pgh = PagoHistorico::create([
            'pag_id' => $payment->pag_id,
            'pgh_columna' => 'pag_estatus',
            'pgh_valor' => $payment->pag_estatus,
            'usu_id' => \Auth::user()->id,
        ]);

        //Execute the Payment
        if ($this->executePayment($payment)) {
            $payment->pag_estatus = Pago::$EST_PORPROCESAR;
            \Session::flash('alert-success', 'Pago ejecutado satisfactoriamente.');
        } else {
            $payment->pag_estatus = Pago::$EST_FALLIDO;
            \Session::flash('alert-danger', 'Ocurrio un error al ejecutar el Pago.');
        }
        $payment->save();

        $pgh = PagoHistorico::create([
            'pag_id' => $payment->pag_id,
            'pgh_columna' => 'pag_estatus',
            'pgh_valor' => $payment->pag_estatus,
            'usu_id' => \Auth::user()->id,
        ]);

        return redirect('home');
    }

    /**
     * Execute de Payment
     * @return bool
     */
    private function executePayment(Pago $payment)
    {

//        Here will be the connection with bridge!

        return $this->getDummyBoleanResponse();
    }

    /**
     * Erase after production
     * @return bool
     */
    public function getDummyBoleanResponse()
    {
        sleep(rand(0, 3));
        $response = rand(1, 100);
        $percent = 95;

        return ($response <= $percent ? true : false);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
