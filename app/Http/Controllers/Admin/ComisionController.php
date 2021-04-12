<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comision;
use Illuminate\Http\Request;

class ComisionController extends Controller
{
    public function __construct(){

        $this->middleware('can:admin.comisions.index')->only('index');
        $this->middleware('can:admin.comisions.create')->only('create','store');
        $this->middleware('can:admin.comisions.edit')->only('edit, update');
        $this->middleware('can:admin.comisions.destroy')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comisions = Comision::all();

        return view('admin.comisions.index', compact('comisions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.comisions.create');
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
            'comision' => 'required|unique:comisions',
            'Tipo' => 'required'
        ]);

        $comision = Comision::create($request->all());

        return redirect()->route('admin.comisions.index', $comision)->with('info', 'La comision se creó con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Comision $comision)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Comision $comision)
    {
        return view('admin.comisions.edit', compact('comision'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Comision $comision)
    {
        $request->validate([
            'comision' => "required|unique:comisions,comision,$comision->id",
            'Tipo' => 'required'
        ]);

        $comision->update($request->all());

        return redirect()->route('admin.comisions.index',$comision)->with('info', 'La comision se modifico con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comision $comision)
    {
        $comision->delete();

        return redirect()->route('admin.comisions.index')->with('info', 'La comision se eliminó con éxito');;
    }
}
