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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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

            $user = UserJun::select('Correo')->where('junta_id',$request['juntas'])->get();

            foreach($user as $users){
    
                Mail::to($users['Correo'])->send(new EventosMailable($datosEvento));
    
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
