<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evento;

class EventoController extends Controller
{
    public function index(){

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
                "display"=>'auto',
                "extendedProps"=>[
                    'descripcion'=>$value->descripcion
                ]
            ];

        }

        return response()->json($nueva_data);
    }
    
}
