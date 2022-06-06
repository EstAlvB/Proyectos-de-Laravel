<?php

namespace App\Http\Controllers;

use App\Models\Pais;
use Illuminate\Http\Request;
use App\Http\Requests\StorePaisRequest;
use App\Http\Requests\UpdatePaisRequest;

class PaisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['paises'] = Pais::paginate(20);
        return view('pais.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pais.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePaisRequest $request)
    {
        $request->validated();
        $datosPais = request()->except('_token');
        Pais::create($datosPais);
        return redirect('pais');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pais  $pais
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $pais = Pais::find($id);
        return view('provincia.index')->with('pais', $pais);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pais  $pais
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pais = Pais::findOrFail($id);
        return view('pais.edit', compact('pais'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pais  $pais
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePaisRequest $request, $id)
    {
        $request->validated();
        $datosPais = request()->except(['_token', '_method']);
        Pais::where('id', '=', $id)->update($datosPais);
        return redirect('pais');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pais  $pais
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pais::destroy($id);
        return redirect('pais');
    }
}
