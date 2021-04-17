<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Junta;
use Illuminate\Http\Request;
use App\Models\Pcertificado;
use App\Models\Documento;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;

class PcertificadoController extends Controller
{
    public function __construct()
    {

        $this->middleware('can:admin.pcertificado.index')->only('index');
        $this->middleware('can:admin.pcertificado.create')->only('create', 'store');
        $this->middleware('can:admin.pcertificado.edit')->only('edit, update');
        $this->middleware('can:admin.pcertificado.destroy')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pcertificado.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $juntas=Junta::select('Nombre')
            ->get();
        $documen=Documento::pluck('nombre','tipo');
        return view('admin.pcertificado.create',compact('juntas','documen'));
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
            'FechaP' => 'required',
            'junta' => 'required',
            'Nit' => 'required',
            'Resolucion' => 'required|numeric',
            'nombre' => 'required',
            'Direccion' => 'required',
            'Tdocumento' => 'required',
            'Documento' => 'required|numeric',
            'Expedido' => 'required',
            'tipo' => 'required',
            'Comprobante' => 'required|mimes:pdf,jpg,png,bmp,jpeg|max:520'
        ]);
        
        $data = $request->except('_token');

        $dataN = Arr::add($data,'Estado','no entregada');


        if ($request->hasFile('Comprobante')) {
            $dataN['Comprobante'] = Storage::put('Comprobantes', $request->file('Comprobante'));
        }

        Pcertificado::create($dataN); 

         return redirect()->route('admin.pcertificado.create')->with('info', 'Su registro se a añadido con exito');
                
    }

    public function certificado(Pcertificado $pcertificado)
    {
        switch ($pcertificado->tipo) {
            case 'residencia':
                $datosu = $pcertificado->toArray();
                $datosu['Estado'] = 'Entregado';
                $pcertificado->update($datosu);
                $pdf = PDF::loadView('Admin.pdf.certificado.certificadoRes', compact('datosu'))->setPaper('letter')->stream('CertificadoResiencia.pdf');
                return $pdf;
                break;
            case 'afiliacion':
                $datosu = $pcertificado->toArray();
                $datosu['Estado'] = 'Entregado';
                $pcertificado->update($datosu);
                $pdf = PDF::loadView('Admin.pdf.certificado.certificadoAfil', compact('datosu'))->setPaper('letter')->stream('CertificadoAfiliado.pdf');
                return $pdf;
                break;
            case 'paz-salvo':
                $datosu = $pcertificado->toArray();
                $datosu['Estado'] = 'Entregado';
                $pcertificado->update($datosu);
                $pdf = PDF::loadView('Admin.pdf.certificado.certificadoPaz', compact('datosu'))->setPaper('letter')->stream('CertificadoPazySAKVO.pdf');
                return $pdf;
                break;
            default:
            return redirect()->route('admin.pcertificado.index')->with('error', 'Ha ocurrido un error');
                break;
        }

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
    public function edit(Pcertificado $pcertificado)
    {
        $juntas=Junta::select('Nombre')
            ->get();
        $documen=Documento::pluck('nombre','tipo');
        return view('admin.pcertificado.edit',compact('juntas','documen','pcertificado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pcertificado $pcertificado)
    {
        $request->validate([
            'FechaP' => 'required',
            'Nit' => 'required',
            'Resolucion' => 'required|numeric',
            'nombre' => 'required',
            'Direccion' => 'required',
            'Tdocumento' => 'required',
            'Documento' => 'required|numeric',
            'Expedido' => 'required',
            'tipo' => 'required',
            'Comprobante' => 'mimes:pdf,jpg,png,bmp,jpeg|max:520'
        ]);
        
        $data = $request->except('_token');
        
        if ($request->hasFile('Comprobante')) {
            Storage::delete($pcertificado->Comprobante);
            $data['Comprobante'] = Storage::put('Comprobantes', $request->file('Comprobante'));
        }

        $pcertificado->update($data);

        return redirect()->route('admin.pcertificado.index')->with('info', 'Su registro se edito con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pcertificado $pcertificado)
    {
        Storage::delete($pcertificado->Comprobante);

        $pcertificado->delete();

        return redirect()->route('admin.pcertificado.index')->with('info', 'El registro de pago, se eliminó con éxito');
    }
}
