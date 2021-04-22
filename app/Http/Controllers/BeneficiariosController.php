<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Censo\Beneficiarios;
use App\Models\Censo\Barrios;
use App\Models\Censo\Eps;
use App\Models\Censo\Censo;

class BeneficiariosController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $eps = Eps::orderBy('name')->get(); // ordenar por nombre

        $user = auth()->user()->id;
        $censo = Censo::where('user_id', '=', $user)->get();
        $barrios = Barrios::orderBy('name')->get(); // ordenar por nombre

        $beneficiarios = Beneficiarios::where('user_id', '=', $user)->get();
        //$beneficiarios = Beneficiarios::orderBy('user_id', 'desc')->paginate(10); //llama a todos los beneficiarios
        if (count($censo) == 0) {
            return redirect()->route('censo.create')->with('alert', 'Registre primero los Datos Básicos');
        }

        return view('beneficiarios.index', compact('beneficiarios', 'barrios', 'eps', 'user', 'censo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
        // $datos = request();
        // Beneficiarios::insert($datos);

        //validate the role fields
        $request->validate([

            'nucleo_fam' => 'required|not_in:Nucleo familiar',
            'name' => 'required|max:45',
            'numero' => 'required|max:10|',
            'tipo_doc' => 'required|not_in: Tipo Doc',
            'edad' => 'required|numeric',
            'genero' => 'required|in:M,F,O',
            'tipo_salud' => 'required|in:Ninguna,Subsidiado,Contributivo',
            'salud' => 'required|not_in:EPS',
            'discap' => 'required|not_in:Discapacidad',
            'sub_gobierno' => 'required|not_in:SubGobierno',
            'nivel_edu' => 'required|not_in:Nivel Edu',

        ]);

        $user = auth()->user();
        $beneficiarios = new Beneficiarios();
        $barrio = Censo::where('user_id', $request->user_id)->pluck('barrio');
        if (isset($barrio) == false) {
            return redirect()->route('censo.index')->with('alert', 'Beneficiario sin datos básicos registrados');;
        }

        $beneficiarios->name = $request->name;

        $beneficiarios->numero = $request->numero;
        $beneficiarios->edad = $request->edad;

        if ($request->edad < 18 and $request->edad > 7) {
            $beneficiarios->tipo_doc = "T.I";
        } elseif ($request->edad <= 7) {
            $beneficiarios->tipo_doc = "R.C";
        } elseif ($request->edad > 18) {
            $beneficiarios->tipo_doc = $request->tipo_doc;
        }
        $beneficiarios->nucleo_fam = $request->nucleo_fam;
        $beneficiarios->genero = $request->genero;
        $beneficiarios->tipo_salud = $request->tipo_salud;
        $beneficiarios->salud = $request->salud;
        $beneficiarios->discap = $request->discap;
        $beneficiarios->nivel_edu = $request->nivel_edu;
        $beneficiarios->sub_gobierno = $request->sub_gobierno;
        $beneficiarios->barrio = $barrio[0];
        $beneficiarios->user_Id = $user->id;

        $beneficiarios->save();
        return redirect('beneficiarios')->with('success', 'Censado exitoso!');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Beneficiarios $beneficiarios)
    {
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Beneficiarios $beneficiarios)
    {
        $eps = Eps::orderBy('name')->get(); // ordenar por nombre

        //get the post with the id $post->idate
        $beneficiarios = Beneficiarios::find($beneficiarios->id);

        // return view
        return view('beneficiarios.edit', compact('beneficiarios', 'eps'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Beneficiarios $beneficiarios)
    {
        $request->validate([
            'nucleo_fam' => 'required|not_in:Nucleo familiar',
            'name' => 'required|max:45',
            'numero' => 'required|max:10|',
            'tipo_doc' => 'required|not_in: Tipo Doc',
            'edad' => 'required|numeric',
            'genero' => 'required|in:M,F,O',
            'tipo_salud' => 'required|in:Ninguna,Subsidiado,Contributivo',
            'salud' => 'required|not_in:EPS',
            'discap' => 'required|not_in:Discapacidad',
            'sub_gobierno' => 'required|not_in:SubGobierno',
            'nivel_edu' => 'required|not_in:Nivel Edu',

        ]);

        $user = auth()->user();
        $beneficiarios = Beneficiarios::findOrFail($beneficiarios->id);
        $barrio = Censo::where('user_id', $beneficiarios->user_id)->pluck('barrio');
        if (isset($barrio) == false) {
            return redirect()->route('censo.index')->with('alert', 'Beneficiario sin datos básicos registrados');;
        }

        $beneficiarios->name = $request->name;
        if ($request->edad < 18 and $request->edad > 6) {
            $beneficiarios['tipo_doc'] = "T.I";
        } elseif ($request->edad < 7) {
            $beneficiarios['tipo_doc'] = "R.C";
        } else {
            $beneficiarios->tipo_doc = $request->tipo_doc;
        }
        $beneficiarios->numero = $request->numero;
        $beneficiarios->edad = $request->edad;
        $beneficiarios->genero = $request->genero;
        $beneficiarios->tipo_salud = $request->tipo_salud;
        $beneficiarios->salud = $request->salud;
        $beneficiarios->discap = $request->discap;
        $beneficiarios->nivel_edu = $request->nivel_edu;
        $beneficiarios->sub_gobierno = $request->sub_gobierno;
        $beneficiarios->nucleo_fam = $request->nucleo_fam;
        $beneficiarios->barrio = $barrio[0];
        $beneficiarios->user_Id = $user->id;

        $beneficiarios->save();
        return redirect('beneficiarios')->with('success', 'Beneficiario registrado con exitoso!');
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

        return redirect()->route('beneficiarios.index')->with('info', 'Beneficiario eliminado');
    }
}
