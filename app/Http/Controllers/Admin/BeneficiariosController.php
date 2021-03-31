<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Censo\Beneficiarios;
use App\Models\Censo\Barrios;
use App\Models\Censo\Eps;

class BeneficiariosController extends Controller
{
   /*  public function __construct(){

        $this->middleware('can:admin.barrios.index')->only('index');
        $this->middleware('can:admin.barrios.create')->only('create','store');
        $this->middleware('can:admin.barrios.edit')->only('edit, update');
        $this->middleware('can:admin.barrios.destroy')->only('destroy');
    } */
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $eps = Eps::orderBy('name')->get(); // ordenar por nombre
        $beneficiarios   = Beneficiarios::all();           
        return view('admin.beneficiarios.index',compact('beneficiarios','eps'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.beneficiarios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /* $request->validate([
            
            
        ]);
 */
        $beneficiarios = Beneficiarios::create($request->all());

        return redirect()->route('admin.barrios.edit', $beneficiarios)->with('info', 'Barrio creado con éxito!');;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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
        $eps = Eps::orderBy('name')->get(); // ordenar por nombre
        $beneficiarios = Beneficiarios::find($id);

        return view('admin.beneficiarios.edit', compact('beneficiarios','eps'));
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
          
            'name' => 'required|max:30',         
            'numero' => 'required|max:10',
            'edad' => 'required|max:2',
              
        ]);

        //$user = auth()->user(); 
        $beneficiarios= Beneficiarios::findOrFail($id);

        $beneficiarios->name = $request->name;
        $beneficiarios->tipo_doc = $request->tipo_doc;
        $beneficiarios->numero = $request->numero;
        $beneficiarios->edad = $request->edad;
        $beneficiarios->genero = $request->genero;
        $beneficiarios->tipo_salud = $request->tipo_salud;
        $beneficiarios->salud = $request->salud;
        $beneficiarios->discap = $request->discap;
        $beneficiarios->nivel_edu = $request->nivel_edu;
        

        $beneficiarios->save();
        return redirect()->route('admin.beneficiarios.edit', $beneficiarios)->with('info', 'Beneficiario actualizado con éxito!');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $beneficiarios = Beneficiarios::find($id);
        $beneficiarios->delete();

        return redirect()->route('admin.beneficiarios.index')->with('info', 'Beneficiario eliminado');;
    }
}
