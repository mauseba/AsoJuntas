<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Junta;
use Illuminate\Http\Request;
use App\Models\Psuscripcion;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Storage;
use App\Models\UserJun;
use Illuminate\Support\Arr;
use Carbon\Carbon;

class PsuscripcionController extends Controller
{
    public function __construct()
    {

        $this->middleware('can:admin.psuscripcion.index')->only('index');
        $this->middleware('can:admin.psuscripcion.create')->only('create', 'store');
        $this->middleware('can:admin.psuscripcion.edit')->only('edit, update');
        $this->middleware('can:admin.psuscripcion.destroy')->only('destroy');
    }

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
        $juntas = Junta::pluck('Nombre', 'id');

        return view('admin.psuscripcion.create', compact('juntas'));
    }

    /**
     * Cambia el valor el mes
     *
     * @return \Illuminate\Http\Response
     */
    public function cambiarMes($data)
    {
        switch ($data) {
            case 'Enero':
                return 'Enero y Febrero';
                break;
            case 'Febrero':
                return 'Febrero y Marzo';
                break;
            case 'Marzo':
                return 'Marzo y Abril';
                break;
            case 'Abril':
                return 'Abril y Mayo';
                break;
            case 'Mayo':
                return 'Mayo y Junio';
                break;
            case 'Junio':
                return 'Junio y Julio';
                break;
            case 'Julio':
                return 'Julio y Agosto';
                break;
            case 'Agosto':
                return 'Agosto y Septiembre';
                break;
            case 'Septiembre':
                return 'Septiembre y Octubre';
                break;
            case 'Octubre':
                return 'Octubre y Noviembre';
                break;
            case 'Noviembre':
                return 'Noviembre y Diciembre';
                break;
            case 'Diciembre':
                return 'Diciembre y Enero';
                break;
            default:
                return $data;
                break;
        }
    }

    /**
     * Valida que el pago solo se a realizado ese mes
     *
     * @return \Illuminate\Http\Response
     */

    public function validar($data,$junta)
    {
        switch ($data['tipo']) {
            
            case 'suscripcion':

                $validate = Psuscripcion::select('Mes', 'Junta_id', 'tipo')
                ->where([
                    ['Mes', $data['Mes']],
                    ['Junta_id', $data['junta_id']],
                    ['tipo', $data['tipo']]
                ])->orWhere([
                    ['Junta_id', $data['junta_id']],
                    ['tipo', 'suscripcion']
                ])->get();
    
                if (count($validate) == 1 && $junta == $data['junta_id']) {
                    return true;
                } elseif(count($validate) == 0) {
                    return true;
                }else{
                    return false;
                }

                break;
            case 'anual':

                $validate = Psuscripcion::select('FechaP')
                ->where([
                    ['Junta_id',$data['junta_id']],
                    ['tipo', $data['tipo']],
                ])
                ->get();
            
                if(count($validate) == 0){
                    return true;
                }elseif(count($validate) == 1 && $junta == $data['junta_id']){
                    return true;
                }
                else{
                    $date1= Carbon::parse($validate[0]->FechaP);
                    $date1->addYear();
                    $date2= Carbon::parse($data['FechaP']);

                    if($date1->year == $date2->year && $date1->month <= $date2->month ){
                        return true;
                    }else{
                        return false;
                    }
                }

                break;
            case 'bimestral':

                $validate = Psuscripcion::select('Mes', 'Junta_id', 'tipo')
                ->where([
                    ['Mes', $data['Mes']],
                    ['Junta_id', $data['junta_id']],
                    ['tipo', $data['tipo']]
                ])->get();
    
                if (count($validate) == 0) {
                    return true;
                } elseif(count($validate) == 1 && $junta == $data['junta_id']) {
                    return true;
                }else{
                    return false;
                }

                break;
        
            default:
                return false;
                break;
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
            'FechaP' => 'required',
            'Mes' => 'required',
            'junta_id' => 'required|numeric',
            'tipo' => 'required',
            'Comprobante' => 'required|mimes:pdf,jpg,png,bmp,jpeg|max:350'

        ]);

        $data = $request->except('_token');

        switch ($data['tipo']) {
            case 'bimestral':
                $Ndata = Arr::set($data, 'Mes', $this->cambiarMes($data['Mes']));

                if ($this->validar($Ndata,'')) {
                    if ($request->hasFile('Comprobante')) {
                        $Ndata['Comprobante'] = Storage::put('Comprobantes', $request->file('Comprobante'));
                    }
                    Psuscripcion::create($Ndata);
                    return redirect()->route('admin.psuscripcion.index')->with('info', 'El registro de pago, se añadio con exito');
                } else {
                    return redirect()->route('admin.psuscripcion.index')->with('error', 'Ya se añadio el recibo de pago, a la fecha seleccionada');
                }
                break;

            case 'suscripcion':

                if ($this->validar($data,'')) {
                    if ($request->hasFile('Comprobante')) {
                        $data['Comprobante'] = Storage::put('Comprobantes', $request->file('Comprobante'));
                    }
                    Psuscripcion::create($data);
                    return redirect()->route('admin.psuscripcion.index')->with('info', 'El registro de pago, se añadio con exito');
                } else {
                    return redirect()->route('admin.psuscripcion.index')->with('error', 'Ya se añadio el recibo de pago, a la fecha seleccionada');
                }
                break;
            
            case 'anual':

                if ($this->validar($data,'')) {
                    if ($request->hasFile('Comprobante')) {
                        $data['Comprobante'] = Storage::put('Comprobantes', $request->file('Comprobante'));
                    }
                    Psuscripcion::create($data);
                    return redirect()->route('admin.psuscripcion.index')->with('info', 'El registro de pago, se añadio con exito');
                } else {
                    return redirect()->route('admin.psuscripcion.index')->with('error', 'Ya se añadio un  pago, al año actual');
                }
                break;

            default:
                return redirect()->route('admin.psuscripcion.index')->with('error', 'Algo salio mal');
                break;
        }
    }

    public function pazsalvo(Psuscripcion $psuscripcion)
    {
        $junta = Junta::where('id', $psuscripcion->junta_id)
            ->get()->first();
        $pdf = PDF::loadView('admin.pdf.certificado.certificadoPSJunta', compact('junta'))->setPaper('letter')->stream('CertificadoPazysalvo.pdf');
        return $pdf;
    }

    public function afiliacion(Psuscripcion $psuscripcion)
    {
        $junta = Junta::where('id', $psuscripcion->junta_id)
            ->get()->first();
        $pdf = PDF::loadView('admin.pdf.certificado.certificadoAJunta', compact('junta'))->setPaper('letter')->stream('CertificadoAfiliacion.pdf');
        return $pdf;
    }

    public function buscador(Psuscripcion $psuscripcion)
    {
        $users = UserJun::join('juntas', 'user_juns.junta_id', '=', 'juntas.id')
            ->select('user_juns.id as user_id', 'user_juns.Num_identificacion', 'juntas.id')
            ->where('juntas.id', $psuscripcion->junta_id)
            ->get();

        if ($users->count() == 0) {
            return redirect()->route('admin.psuscripcion.index')->with('warning', 'No hay afiliados a esta junta');
        } else {
            $userl = UserJun::join('juntas', 'user_juns.junta_id', '=', 'juntas.id')
                ->select('user_juns.*', 'juntas.Nit', 'juntas.Nombre', 'juntas.Resolucion')
                ->where('user_juns.id', $users[0]->user_id)
                ->get()
                ->first();
        }

        return view('admin.psuscripcion.buscador', compact('users', 'userl'));
    }

    public function certificado(Request $request)
    {
        if ($request['usuario'] == "Seleccione...") {

            return redirect()->route('admin.psuscripcion.index')->with('warning', 'seleccione una opcion valida');
        } else {
            $userl = UserJun::join('juntas', 'user_juns.junta_id', '=', 'juntas.id')
                ->select('user_juns.*', 'juntas.Nit', 'juntas.Nombre', 'juntas.Resolucion')
                ->where('user_juns.id', $request['usuario'])
                ->get()
                ->first();

            $users = UserJun::join('juntas', 'user_juns.junta_id', '=', 'juntas.id')
                ->select('user_juns.id as user_id', 'user_juns.Num_identificacion', 'juntas.id')
                ->where('juntas.id', $userl->junta_id)
                ->get();

            return view('admin.psuscripcion.buscador', compact('userl', 'users'));
        }
    }
    public function generarCertificado(Request $request)
    {
        switch ($request['opcion']) {
            case '0':
               // $post->image->url
                $junta = Junta::where('Nit',$request['Nit'])->get()->first();
                $datosu = request()->except('_token', 'Tipo', 'opcion');
                switch ($request['Tipo']) {
                    case '0':  
                        $pdf = PDF::loadView('admin.pdf.certificado.certificadoAfil', compact('datosu','junta'))->setPaper('letter')->stream('CertificadoAfiliado.pdf');
                        return $pdf;
                        break;
                    case '1':
                        $pdf = PDF::loadView('admin.pdf.certificado.certificadoRes', compact('datosu','junta'))->setPaper('letter')->stream('CertificadoResiencia.pdf');
                        return $pdf;
                        break;
                    case '2':
                        $pdf = PDF::loadView('admin.pdf.certificado.certificadoPaz', compact('datosu','junta'))->setPaper('letter')->stream('CertificadoPazySalvo.pdf');
                        return $pdf;
                        break;
                    case '3':
                        $presi = UserJun::join('juntas', 'user_juns.junta_id', '=', 'juntas.id')
                        ->select('user_juns.*', 'juntas.Nit')
                        ->where([
                            ['juntas.Nit',$request['Nit']],
                            ['user_juns.Cargo', 'presidente']
                        ])
                        ->get()->first();

                        if($presi == null){
                            return redirect()->route('admin.psuscripcion.index')->with('error', 'No hay presidentes en esta junta');
                        }
                      
                        $pdf = PDF::loadView('admin.pdf.certificado.certificadoSana', compact('datosu','presi','junta'))->setPaper('a4')->stream('CertificadoSanaTe.pdf');
                        return $pdf;
                        break;
                    default:
                        return redirect()->route('admin.psuscripcion.index')->with('error', 'Seleccione una opcion valida');
                        break;
                }
                break;
            case '1':
                return redirect()->route('admin.psuscripcion.index')->with('error', 'El usuario no esta a paz y salvo con la junta');
                break;
            default:
                return redirect()->route('admin.psuscripcion.index')->with('warning', 'Ingrese todos los campos requeridos');
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
        $juntas = Junta::pluck('Nombre', 'id');
        return view('admin.psuscripcion.edit', compact('juntas', 'psuscripcion'));
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
            'FechaP' => 'required',
            'Mes' => 'required',
            'junta_id' => 'required|numeric',
            'tipo' => 'required',
            'Comprobante' => 'mimes:pdf,jpg,png,bmp,jpeg|max:350'

        ]);

        $data = $request->except('_token');
        switch ($data['tipo']) {
            case 'bimestral':

                $Ndata = Arr::set($data, 'Mes', $this->cambiarMes($data['Mes']));

                if ($this->validar($Ndata, $psuscripcion['junta_id'])) {
                    if ($request->hasFile('Comprobante')) {
                        Storage::delete($psuscripcion->Comprobante);
                        $Ndata['Comprobante'] = Storage::put('Comprobantes', $request->file('Comprobante'));
                    }

                    $psuscripcion->update($Ndata);

                    return redirect()->route('admin.psuscripcion.index')->with('info', 'El registro de pago, se edito con exito');
                } else {
                    return redirect()->route('admin.psuscripcion.index')->with('error', 'Ya se añadio el recibo de pago, a la fecha seleccionada');
                }
                break;

            case 'suscripcion':

                if ($this->validar($data, $psuscripcion['junta_id'])) {
                    if ($request->hasFile('Comprobante')) {
                        Storage::delete($psuscripcion->Comprobante);
                        $data['Comprobante'] = Storage::put('Comprobantes', $request->file('Comprobante'));
                    }
        
                    $psuscripcion->update($data);
        
                    return redirect()->route('admin.psuscripcion.index')->with('info', 'El registro de pago, se edito con exito');
                } else {
        
                    return redirect()->route('admin.psuscripcion.index')->with('error', 'Ya se añadio el recibo de pago, a la fecha seleccionada');
                }
                break;
                case 'anual':

                    if ($this->validar($data,$psuscripcion['junta_id'])) {
                        if ($request->hasFile('Comprobante')) {
                            Storage::delete($psuscripcion->Comprobante);
                            $data['Comprobante'] = Storage::put('Comprobantes', $request->file('Comprobante'));
                        }

                        $psuscripcion->update($data);
                        return redirect()->route('admin.psuscripcion.index')->with('info', 'El registro de pago, se añadio con exito');
                    } else {
                        return redirect()->route('admin.psuscripcion.index')->with('error', 'Ya se añadio un  pago, al año actual');
                    }
                break;
            default:
                return redirect()->route('admin.psuscripcion.index')->with('error', 'Algo salio mal');
                break;
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
