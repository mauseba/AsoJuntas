<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Censo\Eps;
use Illuminate\Http\Request;

 /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

class EpsController extends Controller
{
    public function __construct(){

        $this->middleware('can:admin.eps.index')->only('index');
        $this->middleware('can:admin.eps.create')->only('create','store');
        $this->middleware('can:admin.eps.edit')->only('edit, update');
        $this->middleware('can:admin.eps.destroy')->only('destroy');
    }

    public function index(){
      $eps   = Eps::all();

      return view('admin.eps.index' , compact('eps'));
    }

   


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.eps.create');
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
            'name' => 'required|unique:eps'
            
        ]);

        $eps = Eps::create($request->all());

        return redirect()->route('admin.eps.edit', $eps)->with('info', 'EPS agregada con éxito!');;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Eps $eps)
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
        $eps = Eps::find($id);
        
        return view('admin.eps.edit', compact('eps'));
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
        $eps = Eps::find($id);
        
        $request->validate([
            'name' => 'required|unique:eps'
        ]);

        $eps->update($request->all());

        return redirect()->route('admin.eps.edit', $eps)->with('info', 'La EPS se actualizó con éxito!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $eps = Eps::find($id);
        $eps->delete();

        return redirect()->route('admin.eps.index')->with('info', 'La EPS se eliminó con éxito');;
    }
}
