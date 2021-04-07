<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Evento;
use App\Models\Junta;
use App\Models\UserJun;
use Illuminate\Support\Facades\Mail;
use App\Mail\EventosMailable;


class EventoController extends Controller
{
    public function __construct(){

        $this->middleware('can:admin.eventos.index')->only('index');
        $this->middleware('can:admin.eventos.create')->only('store');
        $this->middleware('can:admin.eventos.edit')->only('update');
        $this->middleware('can:admin.eventos.destroy')->only('destroy');
    }

    public function index()
    {
        $juntas = Junta::all();

        return view('admin.eventos.index', compact('juntas'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        request()->validate([
            'Fecha'=> 'required',
            'hora_inicio'=> 'required',
            'hora_final'=> 'required',
            'juntas'=> 'required',
            'Asunto'=> 'required',
            'opcion'=> 'required',
            'descripcion'=> 'required',
        ]);


        $datosEvento= request()->except('opcion','_token','_method');
        

        $evento=Evento::create($datosEvento);

        if($request->juntas){
            $evento->juntas()->attach($request->juntas);
        }
        
        if($request['opcion']==1){

            foreach ($request['juntas'] as $opcion){
                $correo=[];
                $users[] = UserJun::select('Correo')
                    ->where('junta_id',$opcion)
                    ->where(Function($query){
                        $query->where('Cargo','presidente')
                            ->orWhere('Cargo','secretario');
                    })->get()->toArray();
    
                foreach($users as $data){
                    for($i = 0; $i < count($data); ++$i) {
                        $correo[]= $data[$i]['Correo'];     
                    }
                } 
            }

           foreach($correo as $users){
    
                Mail::to($users)->send(new EventosMailable('',$datosEvento));
    
            }
        }
       
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {

        $data=Evento::all();
        
        $nueva_data = [];

        foreach($data as $value){
            $nueva_data[] = [
                "id" => $value->id,
                "end" => $value->Fecha . " " . $value->hora_final,
                "start" => $value->Fecha . " " . $value->hora_inicio,
                "title" =>$value->Asunto,
                "backgroundColor"=>'#1ADE6C',
                "textColor"=>'#fff',
                "display"=>'block',
                "extendedProps"=>[
                    'descripcion'=>$value->descripcion
                ]
            ];

        }

        return response()->json($nueva_data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Evento $evento)
    {

       $datosEvento= request()->except('opcion','_token','_method');
   

       $evento->update($datosEvento);


       if($request->juntas){
            $evento->juntas()->sync($request->juntas);
        }

        if($request['opcion']==1){

            foreach ($request['juntas'] as $opcion){
                $correo=[];
                $users[] = UserJun::select('Correo')
                    ->where('junta_id',$opcion)
                    ->where(Function($query){
                        $query->where('Cargo','presidente')
                            ->orWhere('Cargo','secretario');
                    })->get()->toArray();
    
                foreach($users as $data){
                    for($i = 0; $i < count($data); ++$i) {
                        $correo[]= $data[$i]['Correo'];     
                    }
                } 
            }

           foreach($correo as $users){
    
                Mail::to($users)->send(new EventosMailable('',$datosEvento));
    
            }
            
        }

        return response()->json($evento);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Evento $evento)
    {
        $evento->delete();
        return response()->json($evento);

    }
}
