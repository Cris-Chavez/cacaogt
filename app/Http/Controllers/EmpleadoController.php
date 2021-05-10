<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empleado;
use App\Models\Empresa;
use App\Http\Requests\StoreEmpleado;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empleados = Empleado::all();

        return view('empleados.index', compact('empleados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $empresas = Empresa::all();

        return view('empleados.create', compact('empresas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEmpleado $request)
    {
        $empleado = new Empleado();

        $empleado->nombre       =   $request->nombre;
        $empleado->apellido     =   $request->apellido;
        $empleado->empresa_id   =   $request->empresa;
        $empleado->email        =   $request->email;
        $empleado->telefono     =   $request->telefono;
        $empleado->save();

        return redirect()->route('empleado.index');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $empleado = Empleado::findOrFail($id);
        $empresas = Empresa::all();

        return view('empleados.show', compact('empleado','empresas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $empleado = Empleado::findOrFail($id);
        $empresas = Empresa::all();

        return view('empleados.edit', compact('empleado','empresas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreEmpleado $request, $id)
    {
        $empleado = Empleado::findOrFail($id);

        $empleado->nombre       =   $request->nombre;
        $empleado->apellido     =   $request->apellido;
        $empleado->empresa_id   =   $request->empresa;
        $empleado->email        =   $request->email;
        $empleado->telefono     =   $request->telefono;
        $empleado->update();

        return redirect()->route('empleado.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empleado $empleado)
    {
        $empleado->delete();

        return redirect()->route('empleado.index');
    }
}
