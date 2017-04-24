<?php

namespace App\Http\Controllers;

use App\Model\PagoHistorico;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

use App\Pagos;

class PagosController extends Controller
{
    /**
     * Display a listing of transaction by Estatus
     *
     * @return \Illuminate\Http\Response
     */
    public function index($estatus)
    {
        $sql =
            ' SELECT * ' .
            ' FROM pagos ' .
            ' WHERE userid = ' . (\Auth::user()->id) .
            ' AND estatus = ' . $estatus .
            ' ORDER BY created_at DESC';
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
            ' WHERE estatus = ' . Pagos::$EST_PORPROCESAR .
            ' ORDER BY created_at ASC';
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
            'cod_procesado'=>'required|unique:pagos|max:100',
            'id'=>'required',
        ]);

        $object = Pagos::find($request->id);

        $object->estatus = Pagos::$EST_PROCESADOS;
        $object->cod_procesado = $request->cod_procesado;
        $object->fecha_procesado = date('Y-m-d H:i:s');
        $object->save();

        $pgh = new PagoHistorico();
        $pgh->createPagoHistorico($object->pagos_id, 'estatus', $object->estatus, null);
        $pgh->save();

        \Session::flash('alert-success','Pago '.$request->cod_procesado.' procesado satisfactoriamente.');

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
        $payment = new Pagos;
        $payment->monto = $request->monto;
        $payment->concepto = $request->concepto;
        $payment->nombretc = $request->nombretc;
        $payment->cith = $request->cipre . $request->cith;

        $payment->userid = \Auth::user()->id;
        $payment->fecha = date('Y-m-d H:i:s');
        $payment->estatus = Pagos::$EST_PENDIENTE;

        $payment->save();

        $pgh = new PagoHistorico();
        $pgh->createPagoHistorico($payment->pagos_id, 'estatus', $payment->estatus, null);
        $pgh->save();

        //Execute the Payment
        if ($this->executePayment($payment)) {
            $payment->estatus = Pagos::$EST_PORPROCESAR;
            \Session::flash('alert-success', 'Pago ejecutado satisfactoriamente.');
        } else {
            $payment->estatus = Pagos::$EST_FALLIDO;
            \Session::flash('alert-danger', 'Ocurrio un error al ejecutar el pago.');
        }
        $payment->save();

        $pgh = new PagoHistorico();
        $pgh->createPagoHistorico($payment->pagos_id, 'estatus', $payment->estatus, null);
        $pgh->save();

        return redirect('home');
    }

    /**
     * Execute de Payment
     * @return bool
     */
    private function executePayment(Pagos $payment)
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
