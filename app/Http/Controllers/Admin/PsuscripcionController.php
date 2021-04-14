<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Junta;
use Illuminate\Http\Request;
use App\Models\Psuscripcion;
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use App\Models\UserJun;

class PsuscripcionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.psuscripcion.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $juntas= Junta::pluck('Nombre','id');

        return view('admin.psuscripcion.create', compact('juntas'));
    }


    public function validar($data)
    {
        $validate = Psuscripcion::select('Mes','Junta_id')
        ->where([
            ['Mes',$data['Mes']],
            ['Junta_id',$data['junta_id']]
        ])->get();
   
        if (count($validate) == 0 && $data['tipo'] == 'suscripcion' ){
            return true;
        }else{
            return false;
        }
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
            'FechaP' =>'required',
            'Mes' => 'required',
            'junta_id'=>'required|numeric',
            'tipo' => 'required',
            'Comprobante' => 'required|mimes:pdf,jpg,png,bmp,jpeg|max:250'

        ]);

        $data = $request->except('_token');
            
        if($this->validar($data))
        {
            
            if ($request->hasFile('Comprobante'))
            {
                $data['Comprobante'] = Storage::put('Comprobantes', $request->file('Comprobante'));
            }
    
    
            $datos = Psuscripcion::create($data);
    
            return redirect()->route('admin.psuscripcion.index')->with('info', 'El registro de pago, se añadio con exito');
        }else{

            return redirect()->route('admin.psuscripcion.index')->with('error', 'Ya se añadio el recibo de pago, a la fecha seleccionada');

        }

      

    }

    public function buscador(Psuscripcion $psuscripcion)
    {
        $users = UserJun::join('juntas','user_juns.junta_id', '=','juntas.id')
            ->select('user_juns.id as user_id','user_juns.Num_identificacion','juntas.id')
            ->where('juntas.id', $psuscripcion->junta_id)
            ->get();
        
        if ($users->count() == 0){    
            return redirect()->route('admin.psuscripcion.index')->with('warning', 'No hay afiliados a esta junta');
        }else{
            $userl= UserJun::join('juntas','user_juns.junta_id', '=','juntas.id')
            ->select('user_juns.*','juntas.Nit','juntas.Nombre','juntas.Resolucion')
            ->where('user_juns.id',$users[0]->user_id)
            ->get()
            ->first();
        }



        return view('admin.psuscripcion.buscador',compact('users','userl'));
    }

    public function certificado(Request $request)
    { 

        if($request['usuario']=="Seleccione..."){

            return redirect()->route('admin.psuscripcion.index')->with('warning', 'seleccione una opcion valida');

        }else{
            $userl= UserJun::join('juntas','user_juns.junta_id', '=','juntas.id')
                ->select('user_juns.*','juntas.Nit','juntas.Nombre','juntas.Resolucion')
                ->where('user_juns.id',$request['usuario'])
                ->get()
                ->first();

            $users = UserJun::join('juntas','user_juns.junta_id', '=','juntas.id')
                ->select('user_juns.id as user_id','user_juns.Num_identificacion','juntas.id')
                ->where('juntas.id', $userl->junta_id)
                ->get();

            return view('admin.psuscripcion.buscador',compact('userl','users'));
        }

    }
    public function generarCertificado(Request $request)
    {   switch ($request['opcion']) {
        case '0':
                $datosu = request()->except('_token','Tipo','opcion');
                switch ($request['Tipo']) {
                    case '0':
                        $date = Carbon::now();
                        $pdf = PDF::loadView('Admin.pdf.certificadoAfil', compact('date','datosu'))->setPaper('letter')->stream('CertificadoAfiliado.pdf');
                        return $pdf;
                        break;
                    case '1':
                        $date = Carbon::now();
                        $pdf = PDF::loadView('Admin.pdf.certificadoRes', compact('date','datosu'))->setPaper('letter')->stream('CertificadoResiencia.pdf');
                        return $pdf;
                        break;      
                    default:
                        return redirect()->route('admin.juntas.index')->with('error', 'Seleccione una opcion valida');
                        break;
                }
            break;
        case '1':
            return redirect()->route('admin.psuscripcion.index')->with('error', 'El usuario no esta a paz y salvo con la junta');
            break;
        default:
            return redirect()->route('admin.psuscripcion.index')->with('warning', 'seleccione una opcion valida');
            break;
    }
       
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Psuscripcion $psuscripcion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Psuscripcion $psuscripcion)
    {
        $juntas= Junta::pluck('Nombre','id');
        return view('admin.psuscripcion.edit', compact('juntas','psuscripcion'));

    }

    public function validarEdit($data,$junta)
    {
        $validate = Psuscripcion::select('Mes','Junta_id')
        ->where([
            ['Mes',$data['Mes']],
            ['Junta_id',$data['junta_id']]
        ])->get();
   
        if ((count($validate) == 0 && $data['tipo'] == 'suscripcion') || $junta == $data['junta_id']){
            return true;
        }else{
            return false;
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Psuscripcion $psuscripcion)
    {
        $request->validate([
            'FechaP' =>'required',
            'Mes' => 'required',
            'junta_id'=>'required|numeric',
            'tipo' => 'required',
            'Comprobante' => 'mimes:pdf,jpg,png,bmp,jpeg|max:250'

        ]);

        $data = $request->except('_token');

        if($this->validarEdit($data, $psuscripcion['junta_id'] ))
        {
            if ($request->hasFile('Comprobante'))
            {
                Storage::delete($psuscripcion->Comprobante);
                $data['Comprobante'] = Storage::put('Comprobantes', $request->file('Comprobante'));
            }
    
            $psuscripcion->update($data);
    
            return redirect()->route('admin.psuscripcion.index')->with('info', 'El registro de pago, se edito con exito');
        }else{

            return redirect()->route('admin.psuscripcion.index')->with('error', 'Ya se añadio el recibo de pago, a la fecha seleccionada');

        }

        
     

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Psuscripcion $psuscripcion)
    {
        Storage::delete($psuscripcion->Comprobante);

        $psuscripcion->delete();

        return redirect()->route('admin.psuscripcion.index')->with('info', 'El registro de pago, se eliminó con éxito');
    }
}
