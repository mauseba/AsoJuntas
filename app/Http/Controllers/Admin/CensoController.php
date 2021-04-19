<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Censo\Censo;
use App\Models\Censo\Beneficiarios;
use App\Models\Censo\Barrios;
use App\Models\User;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;

class CensoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $censo = Censo::all();
        $barrios = Barrios::orderBy('name')->get();
        $beneficiarios = Beneficiarios::all();

        return view('admin.censo.index', compact('censo', 'barrios', 'beneficiarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::all()->sortBy("name");;
        $barrios = Barrios::orderBy('name')->get();
        return view('admin.censo.create', compact('barrios', 'user'));
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
            'user_id' => 'required|not_in:Seleccionar',
            'barrio' => 'required|not_in:Seleccionar',
            'direccion' => 'required',
            'tipo_vivienda' => 'required|not_in:Seleccionar',
            'user_id' => 'unique:censo',
            'sisben' => 'required|not_in:Seleccionar',
            'agua' => 'required',
            'energia' => 'required',
            'gas' => 'required',
            'alcantarilla' => 'required',
            'sub_vivienda' => 'required',
            'piso' => 'required',
            'techo' => 'required',
            'pañete' => 'required',
            'baños' => 'required',
            'baño_nuevo' => 'required',
            'vivienda_nueva' => 'required',
            'sub_gobierno' => 'required|not_in:Seleccionar',

        ]);


        $censo = new Censo();

        $censo->barrio = $request->barrio;
        $censo->direccion = $request->direccion;
        $censo->tipo_vivienda = $request->tipo_vivienda;
        $censo->energia = $request->energia;
        $censo->gas = $request->gas;
        $censo->agua = $request->agua;
        $censo->alcantarilla = $request->alcantarilla;


        if ($request->tipo_vivienda == 'Propia') {
            $censo->escrituras = "Si";
        } else {
            $censo->escrituras = "No";
        }

        $censo->sisben = $request->sisben;
        $censo->sub_vivienda = $request->sub_vivienda;
        $censo->piso = $request->piso;
        $censo->techo = $request->techo;
        $censo->pañete = $request->pañete;
        $censo->baños = $request->baños;
        $censo->baño_nuevo = $request->baño_nuevo;
        $censo->sub_gobierno = $request->sub_gobierno;
        $censo->vivienda_nueva = $request->vivienda_nueva;

        $censo->user_id = $request->user_id;
        $censo->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $barrios = Barrios::orderBy('name')->get();

        $censo = Censo::find($id);

        return view('admin.censo.edit', compact('censo', 'barrios'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'barrio' => 'required',
            'direccion' => 'required',
            'tipo_vivienda' => 'required|not_in:0',
            'user_id' => 'unique:censo',
            'sisben' => 'required|not_in:0',
            'agua' => 'required',
            'energia' => 'required',
            'gas' => 'required',
            'alcantarilla' => 'required',
            'sub_vivienda' => 'required',
            'piso' => 'required',
            'techo' => 'required',
            'pañete' => 'required',
            'baños' => 'required',
            'baño_nuevo' => 'required',
            'vivienda_nueva' => 'required',
        ]);


        $censo = Censo::findOrFail($id);

        $censo->barrio = $request->barrio;
        $censo->direccion = $request->direccion;
        $censo->tipo_vivienda = $request->tipo_vivienda;
        $censo->energia = $request->energia;
        $censo->gas = $request->gas;
        $censo->agua = $request->agua;
        $censo->alcantarilla = $request->alcantarilla;

        if ($request->tipo_vivienda == 'Propia') {
            $censo->escrituras = "Si";
        } else {
            $censo->escrituras = "No";
        }


        $censo->sisben = $request->sisben;
        $censo->sub_vivienda = $request->sub_vivienda;
        $censo->piso = $request->piso;
        $censo->techo = $request->techo;
        $censo->pañete = $request->pañete;
        $censo->baños = $request->baños;
        $censo->baño_nuevo = $request->baño_nuevo;
        $censo->sub_gobierno = $request->sub_gobierno;
        $censo->vivienda_nueva = $request->vivienda_nueva;

        // $censo->user_id = $request->user_id;
        $censo->save();
        return redirect()->route('admin.censo.edit', $censo)->with('info', 'Datos básicos actualizados');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $censo = Censo::find($id);
        $censo->delete();

        return redirect()->route('admin.censo.index')->with('info', 'Datos básicos eliminados');
    }
}
