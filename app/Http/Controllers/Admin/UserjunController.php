<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserJun;
use App\Models\Junta;
use App\Models\Estudio;
use App\Models\Documento;

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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserJun $userjun)
    {
        $request->validate([
            'nombre'  => 'required',
            'Tip_identificacion' => 'required',
            'Num_identificacion'=>'numeric|required|digits_between:7,11|unique:user_juns,Num_identificacion,'.$userjun->id,
            'Num_contacto'=> 'numeric|required',
            'Niv_educacion' => 'required',
            'Correo' => 'required|email',
            'Cargo'=> 'required',
            'junta_id'=> 'required'
        ]);


        $userjun->update($request->all());

        return redirect()->route('admin.userjun.edit', $userjun)->with('info', 'El usuario se actualizó con éxito');
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
}
