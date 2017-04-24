<?php

namespace App\Http\Controllers;

use App\Model\General\ValorVariable;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\View;

class ValorVariableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $list = ValorVariable::all();

        return View::make('General.ValorVariable.index')->with('list',$list);
//        return response()->json([
//            'name' => 'Testing',
//            'lastname' => 'TestingLastName'
//        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return View::make('General.ValorVariable.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request,ValorVariable::$rules);

        $object = new ValorVariable();
        $object->vva_codigo = $request->vva_id;
        $object->vva_valor = $request->vva_id;
        $object->vva_orden = $request->vva_id;
        $object->vva_descripcion = $request->vva_id;

        $object->save();

        $pgh = new PagoHistorico();
        $pgh->createPagoHistorico($object->pagos_id, 'estatus', $object->estatus, null);
        $pgh->save();

        \Session::flash('alert-success','Pago '.$request->cod_procesado.' procesado satisfactoriamente.');

        return redirect('valoresvariables');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
