<?php

namespace App\Http\Controllers;

use App\Pagos;
use Illuminate\Http\Request;

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
        //return view('home');
        //return View::make('home', array('success' => '1'));
        return view('home',
            array(
                'success' => \DB::table('clientes')->where('userid', \Auth::user()->id)->pluck('ci'),
                'EST_PORPROCESAR' => Pagos::$EST_PORPROCESAR,
                'EST_PROCESADOS' => Pagos::$EST_PROCESADOS,
                'EST_FACTURADOS' => Pagos::$EST_FACTURADOS
            )
        );
        //return View::make('home', array('success' => \DB::table('clientes')->where('userid', \Auth::user()->id)->pluck('ci')));
    }
}