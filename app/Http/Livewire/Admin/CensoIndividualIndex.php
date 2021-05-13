<?php

namespace App\Http\Livewire\Admin;

use App\Models\Censo\Censo;
use App\Models\Censo\Beneficiarios;
use App\Models\Censo\Barrios;
use App\Models\UserJun;
use App\Models\Junta;
use Barryvdh\DomPDF\Facade as PDF;
use Livewire\Component;

use Livewire\WithPagination;

class CensoIndividualIndex extends Component
{
    protected $paginationTheme = "bootstrap";

    public $barrio;
    public $direccion;
    public $tipo_vivienda;
    public $energia;
    public $gas;
    public $agua;
    public $alcantarilla;
    public $escrituras;
    public $sisben;
    public $sub_vivienda;
    public $piso;
    public $techo;
    public $pañete;
    public $baños;
    public $baño_nuevo;
    public $vivienda_nueva;
    public $afiliado;
    public $subsidio;
    public $junta;



    public function render()
    {
        $user = UserJun::all();
        $jun = Junta::orderBy('Nombre')->get();
        $barrios = Barrios::orderBy('name')->get();

        $censo = Censo::join('user_juns', 'censo.user_id', '=', 'user_juns.id')
            ->join('juntas', 'juntas.id', '=', 'user_juns.id')
            ->join('barrios', 'barrios.id', '=', 'censo.barrio')
            ->select('censo.*', 'user_juns.nombre', 'user_juns.junta_id', 'juntas.Nombre', 'user_juns.Direccion', 'barrios.name', 'user_juns.nombre')
            ->where('juntas.Nombre', 'LIKE', '%' .  $this->junta . '%')
            ->Where('user_juns.nombre', 'LIKE', '%' .  $this->afiliado . '%')
            ->orderBy('id', 'DESC')
            ->paginate();


        return view('livewire.admin.censo-individual-index', compact('censo', 'user', 'jun', 'barrios'));
    }

    public function exportar()
    {
        $censo = Censo::join('user_juns', 'censo.user_id', '=', 'user_juns.id')
            ->join('juntas', 'juntas.id', '=', 'user_juns.id')
            ->join('barrios', 'barrios.id', '=', 'censo.barrio')
            ->select('censo.*', 'user_juns.nombre', 'user_juns.junta_id', 'juntas.Nombre', 'user_juns.Direccion', 'barrios.Name')
            ->where('juntas.Nombre', 'LIKE', '%' .  $this->junta . '%')
            ->Where('user_juns.nombre', 'LIKE', '%' .  $this->afiliado . '%')
            ->orderBy('id', 'DESC')
            ->get();


        $dato = $censo->pluck('user_id');

        $beneficiarios = Beneficiarios::join('user_juns', 'beneficiarios.user_id', '=', 'user_juns.id')
            ->join('censo', 'censo.user_id', '=', 'beneficiarios.user_id')
            ->join('juntas', 'juntas.id', '=', 'user_juns.id')
            ->join('barrios', 'barrios.id', '=', 'censo.barrio')
            ->select('beneficiarios.*', 'user_juns.nombre', 'user_juns.junta_id', 'juntas.Nombre', 'censo.barrio', 'barrios.Name')
            ->WhereIn('beneficiarios.user_id', $dato)
            ->get();

        $pdf = PDF::loadView('pdf.censo', compact('censo', 'beneficiarios'))->setPaper('a4', 'landscape')->output();
        return response()->streamDownload(fn () => print($pdf), "Informe_CensoIndividual.pdf");
    }
}
