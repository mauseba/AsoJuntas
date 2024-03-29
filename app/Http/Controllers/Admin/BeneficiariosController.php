<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Censo\Beneficiarios;
use App\Models\Censo\Censo;
use App\Models\Censo\Eps;
use App\Models\Censo\Barrios;
use App\Models\Documento;
use App\Models\Estudio;
use App\Models\UserJun;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Arr;



class BeneficiariosController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.beneficiarios.index')->only('index');
        $this->middleware('can:admin.beneficiarios.create')->only('create', 'store');
        $this->middleware('can:admin.beneficiarios.edit')->only('edit, update');
        $this->middleware('can:admin.beneficiarios.destroy')->only('destroy');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        $eps = Eps::orderBy('name')->get(); // ordenar por nombre
        $beneficiarios = Beneficiarios::all();


        return view('admin.beneficiarios.index', compact('beneficiarios', 'eps'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = UserJun::join('juntas', 'user_juns.junta_id', '=', 'juntas.id')
            ->join('comisions', 'user_juns.comision_id', '=', 'comisions.id')
            ->join('censo', 'user_juns.id', '=', 'censo.user_id')
            ->select('user_juns.*', 'juntas.Nombre', 'comisions.comision', 'censo.user_id', 'comisions.Tipo')
            ->get();
        $doc = Documento::pluck('nombre', 'tipo');
        $estu = Estudio::pluck('nombre', 'prefijo');
        $eps = Eps::orderBy('name')->get();
        return view('admin.beneficiarios.create', compact('users', 'eps', 'doc', 'estu'));
    }

    public function busqueda(Request $request)
    {
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
            'nucleo_fam' => 'required|not_in:Seleccionar',
            'name' => 'required|regex:/^[\pL\s\-]+$/u|max:45',
            'numero' => 'required|max:10|',
            'tipo_doc' => 'required|not_in:Seleccionar',
            'edad' => 'required|max:3',
            'genero' => 'required|in:M,F,O',
            'tipo_salud' => 'required|in:Ninguna,Subsidiado,Contributivo',
            'salud' => 'required',
            'discap' => 'required|not_in:Discapacidad',
            'sub_gobierno' => 'required|not_in:Seleccionar',
            'nivel_edu' => 'required|not_in:Seleccionar',
            'user_id' => 'required',

        ]);

        $datos = $request->except('_token');




        if ($datos['edad'] < 18 && $datos['edad'] > 7) {
            $datos['tipo_doc'] = 'TI';
        } elseif ($datos['edad'] <= 7) {
            $datos['tipo_doc'] = "RC";
        } else {
            $datos['tipo_doc'] = "CC";
        }

        Beneficiarios::create($datos);

        return redirect()->route('admin.beneficiarios.index')->with('info', 'Beneficiario creado con éxito!');;
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
        $beneficiarios = Beneficiarios::join('user_juns', 'beneficiarios.user_id', '=', 'user_juns.id')
            ->select('beneficiarios.*', 'user_juns.nombre')->find($id);
        $doc = Documento::all();
        $estu = Estudio::all();
        return view('admin.beneficiarios.edit', compact('beneficiarios', 'eps', 'doc', 'estu'));
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
            'nucleo_fam' => 'required|not_in:Seleccionar',
            'name' => 'required|regex:/^[\pL\s\-]+$/u|max:45',
            'numero' => 'required|max:10|',
            'tipo_doc' => 'required|not_in:Seleccionar',
            'edad' => 'required|max:3',
            'genero' => 'required|in:M,F,O',
            'tipo_salud' => 'required|in:Ninguna,Subsidiado,Contributivo',
            'salud' => 'required',
            'discap' => 'required|not_in:Discapacidad',
            'sub_gobierno' => 'required|not_in:Seleccionar',
            'nivel_edu' => 'required|not_in:Seleccionar',

        ]);

        //$user = auth()->user(); 
        $beneficiarios = Beneficiarios::findOrFail($id);

        $beneficiarios->name = $request->name;
        if ($request->edad < 18 and $request->edad > 7) {
            $beneficiarios->tipo_doc = "TI";
        } elseif ($request->edad <= 7) {
            $beneficiarios->tipo_doc = "RC";
        } elseif ($request->edad > 18) {
            $beneficiarios->tipo_doc = "CC";
        }
        $beneficiarios->numero = $request->numero;
        $beneficiarios->edad = $request->edad;
        $beneficiarios->genero = $request->genero;
        $beneficiarios->tipo_salud = $request->tipo_salud;
        $beneficiarios->salud = $request->salud;
        $beneficiarios->discap = $request->discap;
        $beneficiarios->sub_gobierno = $request->sub_gobierno;
        $beneficiarios->nivel_edu = $request->nivel_edu;
        $beneficiarios->nucleo_fam = $request->nucleo_fam;


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

        return redirect()->route('admin.beneficiarios.index')->with('info', 'Beneficiario eliminado');
    }
}
