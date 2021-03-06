<?php

namespace App\Http\Controllers;

use App\Models\Empleados;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EmpleadosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // paginamos la informacion de un solo
        $datos['empleados'] = Empleados::paginate(5);
        return view('empleados.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('empleados.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // obteniendo los datos de la peticion post
        // $datos = $request->all();

        // traemos todo menos el token
        $datos = $request->except('_token');

        // para obtener y guardar el archivo
        if($request->hasFile('foto')){
            $datos['foto'] = $request->file('foto')->store('uploads', 'public');
        }

        // insertamos
        Empleados::insert($datos);

        return redirect('empleados')->with('mensaje', 'Agregado');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function show(Empleados $empleados)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $e = Empleados::findOrFail($id);

        // enviamos la informacion compactada a travez del enlace
        return view('empleados.edit', compact('e'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // traemos todo menos el token y metodo
        $datos = $request->except(['_token', '_method']);
        $e = Empleados::findOrFail($id);

        // para obtener y guardar el archivo
        if($request->hasFile('foto')){    
            Storage::delete('public/' . $e->foto);
            $datos['foto'] = $request->file('foto')->store('uploads', 'public');
        }

        Empleados::where('id', '=', $id)->update($datos);
        return redirect('empleados');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // para borrar la informacion y la foto
        $e = Empleados::findOrFail($id);

        if(Storage::delete('public/' . $e->foto)){
            Empleados::destroy($id);
        }

        return redirect('empleados')->with('mensaje', 'Borrado');
    }
}
