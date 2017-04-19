<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Pagos;

class PagosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($estatus)
    {
        //
        // Listado de transacciones
       // return view('transactions',array('data' => \DB::table('pagos')->where('userid', \Auth::user()->id)->pluck('monto','concepto')));
        $listado = \DB::select('select * from pagos where userid ='.(\Auth::user()->id).' and estatus = '.$estatus);
        return view('transactions', ['data' => $listado]);
    }

    /**
     * Pagos para ser procesados
     *
     * @return \Illuminate\Http\Response
     */
    public function process()
    {
        //return view('transactions',array('data' => \DB::table('pagos')->pluck('monto','concepto')));
        $listado = \DB::select('select * from pagos where estatus = 0 order by created_at desc');
        return view('process', ['data' => $listado]);
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
        $Pagos->estatus = $request->estatus;
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
