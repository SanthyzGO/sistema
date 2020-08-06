<?php

namespace App\Http\Controllers;

use App\Empleados;
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
        //
        $datos['empleados']=Empleados::paginate(5);
        return view('empleados.index',$datos);
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
        //$datosEmpleado=request()->all();
        
        $datosEmpleado=request()->except('_token');

        if($request->hasFile('Foto')){
            
            $datosEmpleado['Foto']=$request->file('Foto')->store('uploads','public');

        }
        Empleados::insert($datosEmpleado);
        //return response()->json($datosEmpleado);
        return redirect('empleados');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function show(Empleados $empleados)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $empleado=Empleados::findOrFail($id);
        return view('empleados.edit',compact('empleado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $datosEmpleado=request()->except(['_token','_method']);//excluye _token y method

        if($request->hasFile('Foto')){
            $empleado=Empleados::findOrFail($id);//busca la foto por el id

            Storage::delete('public/'.$empleado->Foto);//elimina las fotos

            $datosEmpleado['Foto']=$request->file('Foto')->store('uploads','public');//guarda la foto 

        }

        Empleados::where('id','=',$id)->update($datosEmpleado);   
        $empleado=Empleados::findOrFail($id);//realiza una consulta segun el id
        return view('empleados.edit',compact('empleado'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
      
        $empleado=Empleados::findOrFail($id);//busca la foto por el id
        
        if(Storage::delete('public/'.$empleado->Foto)){//elimina las fotos
            Empleados::destroy($id); //elimina segun el id
        }
        return redirect('empleados');
    }
}
