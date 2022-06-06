<?php

namespace App\Http\Controllers;

use App\Models\Provincia;
use App\Models\Pais;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProvinciaRequest;
use App\Http\Requests\UpdateProvinciaRequest;

class ProvinciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        return view('provincia.index', ['pais' => Pais::find($id)]);
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
    public function store(StoreProvinciaRequest $request)
    {   
        $request->validated();
        $datosProvincia = request()->except(['_token']);
        Provincia::create($datosProvincia);
        return redirect()->route('prov_index', $datosProvincia['pais_id']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Provincia  $provincia
     * @return \Illuminate\Http\Response
     */
    public function show(Provincia $provincia)
    {
        //NULL
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Provincia  $provincia
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
     * @param  \App\Models\Provincia  $provincia
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProvinciaRequest $request)
    {
        $request->validated();
        $datosProvincia = request()->except(['_token', '_method']);
        Provincia::where('id', '=', $datosProvincia['id'])->update($datosProvincia);
        return redirect()->route('prov_index', $datosProvincia['pais_id']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Provincia  $provincia
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Provincia::destroy(request()->id);
        return back();
    }
}
