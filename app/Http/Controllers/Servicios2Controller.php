<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Servicio;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\CreateServicioRequest;

class Servicios2Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $servicios = Servicio::oldest('id')->paginate(3);
        return view('servicios', compact('servicios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create', [
            'servicio' => new Servicio
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateServicioRequest $request)
    {
        $servicio = new Servicio($request->validated());

        if ($request->hasFile('image')) {
            $servicio->image = $request->file('image')->store('images');
        }

        $servicio->save();

        return redirect()->route('servicios.index')->with('estado', 'El servicio fue creado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return view('show', [
            'servicio' => Servicio::find($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Servicio $servicio)
    {
        return view('editar', [
            'servicio' => $servicio
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Servicio $servicio, CreateServicioRequest $request)
    {
        if($request->hasFile('image')){
            Storage::delete($servicio->image);
            $servicio->fill( $request->validated());
            $servicio->image = $request->file('image')->store('image');
            $servicio->save();
        
        }
        else {
            $servicio->update( array_filter($request->validated()) );
        }
        return redirect()->route('servicios.show', $servicio)->with('estado', 'El servicio fue creado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Servicio $servicio)
    {
        Storage::delete($servicio->image);
        $servicio->delete();

        return redirect()->route('servicios.index')->with('estado', 'El servicio fue eliminado correctamente');
    }

    public function __construct()
    {
        $this->middleware('auth')->except('index', 'show');
    }
}
