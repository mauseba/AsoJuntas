<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Junta;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\JuntasExport;

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
    public function create(Junta $junta)
    {  
        $date = Carbon::now('America/Bogota');
        
        return view('admin.juntas.create',compact('date','junta'));
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
                'Nit'=>'required|unique:juntas|regex:/^\d{1,3}(?:\.\d\d\d)(?:\.\d\d\d)*(?:-\d{1,2})?$/',
                'Direccion' => 'required',
                'Nombre' => 'required|unique:juntas',
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
        
        return redirect()->route('admin.juntas.create', $junta)->with('info', 'La junta de accion comunal se creó con éxito');
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
            'Nit'=>'required|regex:/^\d{1,3}(?:\.\d\d\d)(?:\.\d\d\d)*(?:-\d{1,2})?$/|unique:juntas,Nit,'.$junta->id,
            'Direccion' => 'required',
            'Nombre' => 'required|unique:juntas,Nombre,'.$junta->id,
            'D_Recibopago'=> 'mimes:pdf|max:1024',
            'D_NIT' => 'mimes:pdf|max:1024',
            'D_Resolucion' => 'mimes:pdf|max:1024',
            'status' => 'required|in:1,2',
            'Observaciones'=> 'required'
        ]);

       
        
        if ($request->hasFile('D_NIT') && $request->hasFile('D_Resolucion') && $request->hasFile('D_Recibopago')){
            $url = $request->except('_token');
            //
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
        
        return redirect()->route('admin.juntas.index',$junta)->with('info', 'La junta de accion comunal se actualizo correctamente');
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


    public function informe()
    {
        return view('admin.juntas.informe');
    }

    public function generar_informe(Request $request)
    {
        switch ($request['opcion']) {
            case '0':
                return $this->generar_excel();
                break;
            case '1':
                $input = $request->all();
                return $this->generar_pdf($input);
                break;      
            default:
                return redirect()->route('admin.juntas.index')->with('error', 'Seleccione una opcion valida');
                break;
        }
    }

    public function generar_pdf($input)
    {
        $info = Junta::select('*')
        ->whereBetween('FechaC',[$input['txtFechaInicial'],$input['txtFechaFinal']])
        ->get();
        $cuenta = count($info);
        if($cuenta > 0){
            $pdf = PDF::loadView('Admin.pdf.junta', compact('info','cuenta','input'))->setPaper('letter', 'landscape')->stream('informe.pdf');
            return $pdf;
        }else{
            return redirect()->route('admin.junta.index')->with('error', 'No se encuentra ningun registro en las fechas seleccionadas');
        }
    }
    public function generar_excel(){

        return Excel::download(new JuntasExport, 'juntas-list.xlsx');
    }

}
