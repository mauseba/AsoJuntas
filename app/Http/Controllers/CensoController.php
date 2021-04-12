<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\View;
use Barryvdh\DomPDF\Facade as PDF;

use App\Models\Censo\Barrios;
use App\Models\Censo\Beneficiarios;
use App\Models\Censo\Censo;

class CensoController extends Controller
{
    
    public function exportPdf() // Exportar Informe Usuario Censo 
    {
        set_time_limit(300);
        $user = auth()->user()->id; 
        $censo = Censo::where('user_id','=',$user)->get();
        $beneficiarios = Beneficiarios::where('user_id','=',$user)->get();

        $pdf = PDF::loadView('censo.pdf',compact('censo','beneficiarios'))->setPaper('a4', 'landscape');
        
        return $pdf->stream('Micenso.pdf');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user()->id;                         
        $censo = Censo::where('user_id','=',$user)->get();
               
        return view('censo.index',compact('censo','user',));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {     
        $user = auth()->user()->id; 
            
      $barrios = Barrios::orderBy('name')->get();// ordenar por nombre       
      $censo = Censo::where('user_id','=',$user)->get(); //llama al formulario del usuario autenticado
      if ( $censo->count() === 1 ) {
        return redirect()->route('censo.index');
    } 

      return View::make('censo.create')->with(compact('user','barrios','censo'));
      
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
            'barrio' => 'required',
            'direccion' => 'required',
            'tipo_vivienda'=>'required|not_in:0',
            'user_id'=> 'unique:censo',
            'sisben'=> 'required|not_in:0',
            'agua'=> 'required',
            'energia'=> 'required',
            'gas'=> 'required',
            'alcantarilla'=> 'required',
            'sub_vivienda'=> 'required',
            'piso'=> 'required',
            'techo'=> 'required',
            'pañete'=> 'required',
            'baños'=> 'required',
            'baño_nuevo'=> 'required',
            'vivienda_nueva'=> 'required',
        ]);

        $user = auth()->user(); 
        $censo= new Censo();

        $censo->barrio=$request->barrio;
        $censo->direccion=$request->direccion;
        $censo->tipo_vivienda=$request->tipo_vivienda;
        $censo->energia=$request->energia;
        $censo->gas=$request->gas;
        $censo->agua=$request->agua;
        $censo->alcantarilla=$request->alcantarilla;
        
        
        if ($request->tipo_vivienda == 'Propia') {
            $censo->escrituras= "Si";
        }else{
            $censo->escrituras= "No";
        }

        $censo->sisben=$request->sisben;
        $censo->sub_vivienda=$request->sub_vivienda;
        $censo->piso=$request->piso;
        $censo->techo=$request->techo;
        $censo->pañete=$request->pañete;
        $censo->baños=$request->baños;
        $censo->baño_nuevo=$request->baño_nuevo;
        $censo->vivienda_nueva=$request->vivienda_nueva;

        $censo->user_Id = $user->id;
        $censo->save();
        // $censo = Censo::create($request->all());
        
        return redirect()->route('censo.index', $censo)->with('info', 'Datos registrados con éxito!');;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Censo\Censo  $censo
     * @return \Illuminate\Http\Response
     */
    public function show(Censo $censo)
    {
        $user = auth()->user()->id; 
        $beneficiarios = Beneficiarios::where('user_id','=',$user)->get();
        $censo = Censo::where('user_id','=',$user)->get(); //llama al formulario del usuario autenticado

       return view('censo.show', compact('censo','beneficiarios'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Censo\Censo  $censo
     * @return \Illuminate\Http\Response
     */
    public function edit(Censo $censo)
    {
        $barrios = Barrios::orderBy('name')->get(); // ordenar por nombre
        $user = auth()->user()->id; 
      //  $censo = Censo::where('user_id','=',$user)->get();
        $censo = Censo::find($censo->id);
        $verificacion = Censo::where('user_id','=',$user)->pluck('user_id');
       
        
        return view('censo.edit', compact('censo','barrios','verificacion','user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Censo\Censo  $censo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Censo $censo)
    {
        $request->validate([
            'barrio' => 'required',
            'direccion' => 'required',
            'tipo_vivienda'=>'required|not_in:0',
            'user_id'=> 'unique:censo',
            'sisben'=> 'required|not_in:0',
            'agua'=> 'required',
            'energia'=> 'required',
            'gas'=> 'required',
            'alcantarilla'=> 'required',
            'sub_vivienda'=> 'required',
            'piso'=> 'required',
            'techo'=> 'required',
            'pañete'=> 'required',
            'baños'=> 'required',
            'baño_nuevo'=> 'required',
            'vivienda_nueva'=> 'required',
        ]);
            
        $user = auth()->user(); 
        $censo= Censo::findOrFail($censo->id);

        $censo->barrio=$request->barrio;
        $censo->direccion=$request->direccion;
        $censo->tipo_vivienda=$request->tipo_vivienda;
        $censo->energia=$request->energia;
        $censo->gas=$request->gas;
        $censo->agua=$request->agua;
        $censo->alcantarilla=$request->alcantarilla;

        if ($request->tipo_vivienda == 'Propia') {
            $censo->escrituras= "Si";
        }else{
            $censo->escrituras= "No";
        }
           
        
        $censo->sisben=$request->sisben;
        $censo->sub_vivienda=$request->sub_vivienda;
        $censo->piso=$request->piso;
        $censo->techo=$request->techo;
        $censo->pañete=$request->pañete;
        $censo->baños=$request->baños;
        $censo->baño_nuevo=$request->baño_nuevo;
        $censo->vivienda_nueva=$request->vivienda_nueva;

        $censo->user_id = $user->id;
        $censo->save();
       
        
        return redirect('censo')->with('success', 'Datos actualizados con exitoso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Censo\Censo  $censo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Censo $censo)
    {
        //
    }
}
