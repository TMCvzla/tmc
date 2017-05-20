<?php

namespace App\Http\Controllers;

use App\Pago;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home',
            array(
                'success' => \DB::table('clientes')->where('usu_id', \Auth::user()->usu_id)->pluck('cli_ci'),
                'EST_PORPROCESAR' => Pago::$EST_PORCONCILIAR . ',' . Pago::$EST_CONCILIADO,
                'EST_PORCONCILIAR' => Pago::$EST_PORCONCILIAR,
                'EST_CONCILIADO' => Pago::$EST_CONCILIADO,
                'EST_PROCESADO' => Pago::$EST_PROCESADO,
                'EST_FACTURADO' => Pago::$EST_FACTURADO
            )
        );
        //return View::make('home', array('success' => \DB::table('clientes')->where('userid', \Auth::user()->usu_id)->pluck('ci')));
    }
}