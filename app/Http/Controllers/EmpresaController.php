<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empresa;
use App\Http\Requests\StoreEmpresa;
use Illuminate\Support\Facades\Storage;

use str;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empresas = Empresa::all();

        return view('empresas.index',compact('empresas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('empresas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEmpresa $request)
    {
        $empresa = new Empresa();
        
        $imagen = $request->File('logo')->store('public/logos');
        $logo = Storage::url($imagen);

        $empresa->nombre    =   $request->nombre;
        $empresa->email     =   $request->email;
        $empresa->website   =   $request->website;
        $empresa->direccion =   $request->direccion;
        $empresa->logo      =   $logo;
        $empresa->save();

        return redirect()->route('empresa.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $empresa = Empresa::findOrFail($id);

        return view('empresas.show', compact('empresa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $empresa = Empresa::findOrFail($id);        

        return view('empresas.edit', compact('empresa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreEmpresa $request, $id)
    {
        $empresa = Empresa::findOrFail($id);;

        $imagen = $request->File('logo')->store('public/logos');
        $logo = Storage::url($imagen);

        $empresa->nombre    =   $request->nombre;
        $empresa->email     =   $request->email;
        $empresa->website   =   $request->website;
        $empresa->direccion =   $request->direccion;
        $empresa->logo      =   $logo;
        $empresa->update();

        return redirect()->route('empresa.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empresa $empresa)
    {
        $empresa->delete();

        return redirect()->route('empresa.index');
    }
}
