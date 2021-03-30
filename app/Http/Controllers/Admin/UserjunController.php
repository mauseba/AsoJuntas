<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserJun;
use App\Models\Junta;
use App\Models\Estudio;
use App\Models\Documento;
use App\Models\Evento;
use Barryvdh\DomPDF\Facade as PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UserJunExport;

class UserjunController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.userjun.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(UserJun $userjun)
    {
        $documen=Documento::pluck('nombre','tipo');
        $estudio=Estudio::pluck('nombre','prefijo');
        $junta=Junta::orderBy('id', 'desc')->pluck('Nombre','id');

        return view('admin.userjun.create',compact('junta','estudio','documen'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    /*$request->validate([
            'nombre'  => 'required|array',
            'Tip_identificacion[]' => 'required',
            'Num_identificacion[]'=>'numeric|required|unique:userjun|digits_between:7,11',
            'Num_contacto[]'=> 'numeric|required',
            'Niv_educacion[]' => 'required',
            'Correo[]' => 'required|email',
            'Cargo[]'=> 'required',
            'junta_id[]'=> 'required'
        ]);*/

       $url = [];
        foreach($request->except('_token') as $key => $value) {
            for($i = 0; $i < count($value); ++$i) {
                $url[$i][$key] = $value[$i];
            }
        }
       
       foreach($url as $ur){
            $userjun=UserJun::create($ur);
        }
        
        return redirect()->route('admin.userjun.index',$userjun)->with('info', 'El usuario se creo con éxito');
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
    public function edit(UserJun $userjun)
    {
        $documen=Documento::pluck('nombre','tipo');
        $estudio=Estudio::pluck('nombre','prefijo');
        $juntas=Junta::pluck('Nombre','id');

        return view('admin.userjun.edit',compact('juntas','userjun','estudio','documen'));

    }

    public function validar($rol,$junta)
    {
        $validate = UserJun::select('Cargo','Junta_id')
            ->where([
                ['Cargo',$rol],
                ['junta_id',$junta]
            ])->get();

        if (count($validate) == 0 || $rol == "asociado"){

            return true;
        }else{

            return false;
        }
            
    }

    public function update(Request $request, UserJun $userjun)
    {


        $request->validate([
            'nombre'  => 'required',
            'Tip_identificacion' => 'required',
            'Num_identificacion'=>'numeric|required|digits_between:7,11|unique:user_juns,Num_identificacion,'.$userjun->id,
            'Direccion' => 'required' ,
            'Genero'  => 'required' ,
            'Edad'  => 'numeric|required',
            'Num_contacto'=> 'numeric|required',
            'Niv_educacion' => 'required',
            'Correo' => 'required|email',
            'Cargo'=> 'required',
            'junta_id'=> 'required'
        ]);

        if($this-> validar($request['Cargo'],$request['junta_id'])){

            $userjun->update($request->all());

            return redirect()->route('admin.userjun.index', $userjun)->with('info', 'El usuario se actualizó con éxito');

        }else{
            return redirect()->route('admin.userjun.edit', $userjun)->with('error', 'El rol se repite en la misma junta');
        }
       

       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserJun $userjun)
    {
        $userjun->delete();

        return redirect()->route('admin.userjun.index', $userjun)->with('info', 'El usuario se elimino con éxito');
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
                return redirect()->route('admin.userjun.index')->with('error', 'Seleccione una opcion valida');
                break;
        }
    }

    public function generar_pdf($input)
    {
        $info = UserJun::join('juntas','user_juns.junta_id', '=','juntas.id')
        ->select('user_juns.*','juntas.Nombre')
        ->whereDate('user_juns.created_at','>', $input['txtFechaInicial'])
        ->whereDate('user_juns.created_at','<', $input['txtFechaFinal'])
        ->get();

        $cuenta = count($info);
        if($cuenta > 0){
            $pdf = PDF::loadView('Admin.pdf.userjun', compact('info','cuenta','input'))->setPaper('letter', 'landscape')->stream('informe.pdf');
            return $pdf;
        }else{
            return redirect()->route('admin.userjun.index')->with('error', 'No se encuentra ningun registro en las fechas seleccionadas');
        }
    }
    public function generar_excel(){

        return Excel::download(new UserJunExport, 'UsuarioJuntas-list.xlsx');
    }


}
