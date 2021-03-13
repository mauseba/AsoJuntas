<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Junta;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class JuntaController extends Controller
{
    public function __construct(){

        $this->middleware('can:admin.juntas.index')->only('index');
        $this->middleware('can:admin.juntas.create')->only('create','store');
        $this->middleware('can:admin.juntas.edit')->only('edit, update');
        $this->middleware('can:admin.juntas.destroy')->only('destroy');
    }

    public function index()
    {
        
        return view('admin.juntas.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {  
        $date = Carbon::now('America/Bogota');
        return view('admin.juntas.create',compact('date'));
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
                'FechaC'  => 'required',
                'Vereda' => 'required',
                'Nit'=>'required|unique:juntas|regex:/^\d{1,3}(?:\.\d\d\d)(?:\.\d\d\d)*(?:-\d{1,2})?$/',
                'D_Recibopago'=> 'required|mimes:pdf|max:2048',
                'D_NIT' => 'required|mimes:pdf|max:2048',
                'D_Resolucion' => 'required|mimes:pdf|max:2048',
                'Observaciones'=> 'required'
            ]);
        
        $url = $request->except('_token');
        
        if ($request->hasFile('D_NIT') || $request->hasFile('D_Resolucion') || $request->hasFile('D_Recibopago')){
            $url['D_NIT'] = Storage::put('NIT', $request->file('D_NIT'));
            $url['D_Resolucion'] = Storage::put('resolucion', $request->file('D_Resolucion'));  
            $url['D_Recibopago'] = Storage::put('recibopago', $request->file('D_Recibopago'));  
        }
        
        $junta = Junta::create($url);
        
        return redirect()->route('admin.juntas.edit', $junta)->with('info', 'La junta de accion comunal se creó con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Junta $junta)
    {
        return view('admin.juntas.show',compact('junta'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Junta $junta)
    {
        return view('admin.juntas.edit',compact('junta'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Junta $junta)
    {
        $request->validate([
            'FechaC'  => 'required',
            'Vereda' => 'required',
            'Nit'=>'required|regex:/^\d{1,3}(?:\.\d\d\d)(?:\.\d\d\d)*(?:-\d{1,2})?$/|unique:juntas,Nit,'.$junta->id,
            'D_Recibopago'=> 'mimes:pdf|max:2048',
            'D_NIT' => 'mimes:pdf|max:2048',
            'D_Resolucion' => 'mimes:pdf|max:2048',
            'status' => 'required|in:1,2',
            'Observaciones'=> 'required'
        ]);

        $url = $request->except('_token');
        

        if ($request->hasFile('D_NIT') && $request->hasFile('D_Resolucion') && $request->hasFile('D_Recibopago')){
            Storage::delete($junta->D_Recibopago);
            Storage::delete($junta->D_NIT);
            Storage::delete($junta->D_Resolucion);  
                
            $url['D_NIT'] = Storage::put('NIT', $request->file('D_NIT'));
            $url['D_Resolucion'] = Storage::put('resolucion', $request->file('D_Resolucion')); 
            $url['D_Recibopago'] = Storage::put('recibopago', $request->file('D_Recibopago'));  

            $junta->update($url);
                
        }elseif($request->hasFile('D_NIT')){
            $url1= $request->except('D_Resolucion','D_Recibopago','_token');

            Storage::delete($junta->D_NIT);
            $url1['D_NIT'] = Storage::put('NIT', $request->file('D_NIT'));
            $junta->update($url1);

        }elseif($request->hasFile('D_Resolucion')){
            $url2= $request->except('D_NIT','D_Recibopago','_token');

            Storage::delete($junta->D_Resolucion);
            $url2['D_Resolucion'] = Storage::put('resolucion', $request->file('D_Resolucion')); 
            $junta->update($url2);

        }elseif($request->hasFile('D_Recibopago')){
            $url3= $request->except('D_NIT','D_Resolucion','_token');

            Storage::delete($junta->D_Recibopago);
            $url3['D_Recibopago'] = Storage::put('recibopago', $request->file('D_Recibopago')); 
            $junta->update($url3);

        }else{
            $url4= $request->except('D_NIT','D_Resolucion','D_Recibopago','_token');
            $junta->update($url4);
        }
        
        return redirect()->route('admin.juntas.edit',$junta)->with('info', 'La junta de accion comunal se actualizo correctamente');
    }
        

    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Junta $junta)
    {
        Storage::delete($junta->D_Recibopago);
        Storage::delete($junta->D_NIT);
        Storage::delete($junta->D_Resolucion);

        $junta->delete();

        return redirect()->route('admin.juntas.index')->with('info', 'La junta de accion comunal se eliminó con éxito');
    }
}
