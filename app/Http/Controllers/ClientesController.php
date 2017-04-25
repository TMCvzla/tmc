<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Http\Controllers;
use App\Http\Requests;
use DB;
use Illuminate\Http\Request;

class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $clientes = new Cliente;
        $clientes->cli_nombre = $request->nombre;
        $clientes->cli_ci = $request->cipre.$request->ci;
        $clientes->cli_email = $request->email;
        $clientes->usu_id = $request->userid;
        $clientes->cli_direccionfiscal = $request->dirfiscal;
        $clientes->cli_direccionenvio = $request->direnvio;
        $clientes->cli_banco = $request->banco;
        $clientes->cli_nrocuenta = $request->cuenta;
        $clientes->cli_tipocuenta = $request->tipocuenta;
        $clientes->save();

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
