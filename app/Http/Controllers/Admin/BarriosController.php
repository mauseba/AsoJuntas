<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Censo\Barrios;

class BarriosController extends Controller
{
    public function __construct(){

        $this->middleware('can:admin.barrios.index')->only('index');
        $this->middleware('can:admin.barrios.create')->only('create','store');
        $this->middleware('can:admin.barrios.edit')->only('edit, update');
        $this->middleware('can:admin.barrios.destroy')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

  
    
        public function index(){
            $barrios   = Barrios::all();           
         return view('admin.barrios.index',compact('barrios'));
        }
    
       
    
    
        /**
         * Show the form for creating a new resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function create()
        {
            return view('admin.barrios.create');
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
                'name' => 'required|unique:barrios'
                
            ]);
    
            $barrios = Barrios::create($request->all());
    
            return redirect()->route('admin.barrios.edit', $barrios)->with('info', 'Barrio creado con éxito!');;
        }
    
        /**
         * Display the specified resource.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function show(Barrios $barrios)
        {
            //
        }
    
        /**
         * Show the form for editing the specified resource.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function edit($id)
        {
            $barrios = Barrios::find($id);

            return view('admin.barrios.edit', compact('barrios'));
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
            $barrios = Barrios::find($id);

            $request->validate([
                'name' =>  "required|unique:barrios"
             
            ]);
    
            $barrios->update($request->all());
    
            return redirect()->route('admin.barrios.edit', $barrios)->with('info', 'El Barrio/Vereda se actualizó con éxito!');
        }
    
        /**
         * Remove the specified resource from storage.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function destroy($id)
        {
            $barrios = Barrios::find($id);
            $barrios->delete();

            return redirect()->route('admin.barrios.index')->with('info', 'El barrio se eliminó con éxito');;
        }
    }
    