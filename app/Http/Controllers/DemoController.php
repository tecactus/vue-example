<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\NuevaMascotaRequest;

class DemoController extends Controller
{
    public function instancias()
    {
        return view('instancias');
    }

    public function selects1()
    {
    	$mascotas = \App\Mascota::all();
    	$razas = \App\Raza::all();
    	return view('selects-1', compact('razas', 'mascotas'));
    }

    public function selects2()
    {
    	$mascotas = \App\Mascota::all();
    	$tipos = \App\TipoMascota::all();
    	return view('selects-2', compact('tipos', 'mascotas'));
    }

    public function selects3()
    {
    	$mascotas = \App\Mascota::all();
    	$tipos = \App\TipoMascota::all();
    	return view('selects-3', compact('tipos', 'mascotas'));
    }

    public function selects4()
    {
    	return view('selects-4');
    }

    public function guardarMascota(NuevaMascotaRequest $request)
    {
    	$mascota = \App\Mascota::create($request->all());

    	if ($request->expectsJson()) {
    		return response()->json('registro creado');
    	}

    	return redirect()->back()->with('success', 'registro creado');
    }
}
