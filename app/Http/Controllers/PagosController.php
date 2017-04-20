<?php

namespace App\Http\Controllers;

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
            ' ORDER BY created_at DESC';
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
        $object = Pagos::find($request->id);

        $object->estatus = Pagos::$EST_PROCESADOS;
        $object->cod_procesado = $request->codigo;
        $object->fecha_procesado = date('Y-m-d H:i:s');
        $object->save();

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
        //
        $Pagos = new Pagos;
        $Pagos->monto = $request->monto;
        $Pagos->concepto= $request->concepto;
        $Pagos->nombretc= $request->nombretc;
        $Pagos->cith = $request->cipre.$request->cith;
        $Pagos->userid= $request->userid;
        $Pagos->fecha= date('Y-m-d H:i:s');
        $Pagos->estatus = Pagos::$EST_PORPROCESAR;
        $Pagos->save();
        return redirect('home');
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
