<?php

namespace App\Http\Controllers;

use App\Models\Ciudad;
use App\Models\Provincia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CiudadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        return view('ciudad.index', ['provincia' => Provincia::find($id)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //NULL
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|unique:ciudades,nombre,NULL,NULL,pais_id,' . $request['pais_id']
        ]);
 
        if ($validator->fails()) {
            return back()->withErrors($validator)->with('modalError', 'CrearModal');
        }

        $datosCiudad = request()->except(['_token']);
        Ciudad::create($datosCiudad);
        return redirect()->route('ci_index', $datosCiudad['provincia_id']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ciudad  $ciudad
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //NULL
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ciudad  $ciudad
     * @return \Illuminate\Http\Response
     */
    public function edit(Ciudad $ciudad)
    {
        //NULL
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ciudad  $ciudad
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $provincia_id)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'unique:ciudades,nombre,' . $request['id'] .',id,pais_id,' . $request['pais_id']
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->with('modalError', 'EditarModal');
        }

        $datosCiudad = request()->except(['_token', '_method']);
        Ciudad::where('id', '=', $datosCiudad['id'])->update($datosCiudad);
        return redirect()->route('ci_index', $provincia_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ciudad  $ciudad
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Ciudad::destroy($request['id']);
        return back();
    }
}
