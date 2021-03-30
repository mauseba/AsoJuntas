<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Acta;
use App\Models\Evento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ActaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.actas.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $evento= Evento::all()->last();
        return view('admin.actas.create',compact('evento'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'url'  => 'required',
            'evento_id'=>'required|unique:actas',
        ]);

        $acta = $request->except('_token','Fecha','asunto');

        if ($request->hasFile('url')){
            $acta['url'] = Storage::put('Actas', $request->file('url'));
        }

        $actas = Acta::create($acta);

        return redirect()->route('admin.actas.index', $actas)->with('info', 'El acta del evento se añadio con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Acta $acta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Acta $acta)
    {
        $eventos = Evento::select('Fecha','Asunto')->where('id',$acta->evento_id)->get()->toArray();
        return view('admin.actas.edit',compact('acta','eventos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Acta $acta)
    {
        $request->validate([
            'url'  => 'required',
            'evento_id'=>'required|unique:actas,evento_id,'.$acta->id,
        ]);
  
        $doc = $request->except('_token','Fecha','asunto');

        if ($request->hasFile('url')){

            Storage::delete($acta->url);

            $doc['url'] = Storage::put('Actas', $request->file('url'));
        }

        $acta->update($doc);

        return redirect()->route('admin.actas.index', $acta)->with('info', 'El acta se edito con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Acta $acta)
    {
        //
    }
}
