<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Servicio;
use App\Http\Requests\CreateServicioRequest;

class Servicios2Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $servicios= Servicio::oldest('id')->paginate(3);
        return view('servicios',compact('servicios'));//
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create',[
            'servicio'=>new Servicio
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateServicioRequest $request)
    {   
        {
            Servicio::create($request->validated());
            // return redirect()->route('servicios')->with('success', 'Service created successfully!');
            return redirect()->route('servicios.index')->with('estado','El servicio fue creado correctamente');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return view('show',[
            'servicio'=>Servicio::find($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    //funcion de editar envia un servicio
    public function edit(Servicio $servicio)
    {
        return view('editar', [
            'servicio'=>$servicio
        ]);
        //
    }


    /**
     * Update the specified resource in storage.
     */
    //funcion modificar
    public function update(Servicio $servicio, CreateServicioRequest $request)
    {
        $servicio->update($request->validated());

        // return redirect()->route('servicios.show',$id);
        return redirect()->route('servicios.show', $servicio)->with('estado','El servicio fue creado correctamente');
        //
    }


    /**
     * Remove the specified resource from storage.
     */
    //funcion eliminar 
    public function destroy(Servicio $servicio)
    {
        $servicio->delete();

        // return redirect()->route('servicios');//
        return redirect()->route('servicios.index')->with('estado','El servicio fue eliminado correctamente');
    }

    public function __construct(){
        // $this->middleware('auth')->only('create','edit');
        $this->middleware('auth')->except('index','show');

    }
}
