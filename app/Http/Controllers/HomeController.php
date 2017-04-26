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
                'success' => \DB::table('clientes')->where('usu_id', \Auth::user()->id)->pluck('cli_ci'),
                'EST_PORPROCESAR' => Pago::$EST_PORPROCESAR,
                'EST_PROCESADOS' => Pago::$EST_PROCESADOS,
                'EST_FACTURADOS' => Pago::$EST_FACTURADOS
            )
        );
        //return View::make('home', array('success' => \DB::table('clientes')->where('userid', \Auth::user()->id)->pluck('ci')));
    }
}