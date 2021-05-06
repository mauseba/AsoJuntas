<?php

namespace App\Http\Livewire\Admin;


use App\Models\Censo\Beneficiarios;
use App\Models\Censo\Eps;
use App\Models\Censo\Barrios;
use App\Models\Documento;
use App\Models\Estudio;
use App\Models\UserJun;
use App\Models\Junta;
use Barryvdh\DomPDF\Facade as PDF;
use Livewire\Component;

use Livewire\WithPagination;

class BeneficiariosIndex extends Component
{

    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public $nombre;
    public $documento;
    public $numero;
    public $edad_max = 99;
    public $edad_min;
    public $genero;
    public $afiliacion;
    public $eps;
    public $discapacidad;
    public $edu;
    public $afiliado;
    public $subsidio;
    public $barrio;
    public $junta;


    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $user = UserJun::all();
        $epss = Eps::all()->sortby('name'); // ordenar por nombre
        $doc = Documento::all();
        $barrios = Barrios::orderBy('name')->get();
        $estu = Estudio::all();
        $jun = Junta::all()->sortby('Nombre');

        $beneficiarios = Beneficiarios::join('user_juns', 'beneficiarios.user_id', '=', 'user_juns.id')

            ->join('juntas', 'juntas.id', '=', 'user_juns.id')
            ->select('beneficiarios.*', 'user_juns.nombre', 'user_juns.junta_id', 'juntas.Nombre', 'censo.barrio')
            ->where('juntas.Nombre', 'LIKE', $this->junta)
            ->where('name', 'LIKE', '%' . $this->nombre . '%')
            ->Where('tipo_doc', 'LIKE', '%' . $this->documento . '%')
            ->Where('numero', 'LIKE', '%' . $this->numero . '%')
            ->whereBetween('beneficiarios.edad', [$this->edad_min . '%', $this->edad_max . '%'])
            ->Where('beneficiarios.genero', 'LIKE', '%' . $this->genero . '%')
            ->Where('tipo_salud', 'LIKE', '%' . $this->afiliacion . '%')
            ->Where('salud', 'LIKE', '%' . $this->eps . '%')
            ->Where('discap', 'LIKE', '%' . $this->discapacidad . '%')
            ->Where('nivel_edu', 'LIKE', '%' . $this->edu . '%')
            ->Where('beneficiarios.sub_gobierno', 'LIKE', '%' . $this->subsidio . '%')

            ->Where('user_id', 'LIKE',  $this->afiliado)
            ->orderBy('id', 'DESC')
            ->paginate();

        return view('livewire.admin.beneficiarios-index', compact('beneficiarios', 'user', 'epss', 'barrios', 'estu', 'doc', 'jun'));
    }
    public function exportar()
    {

        $beneficiarios = Beneficiarios::join('user_juns', 'beneficiarios.user_id', '=', 'user_juns.id')
            ->join('juntas', 'juntas.id', '=', 'user_juns.id')
            ->select('beneficiarios.*', 'user_juns.nombre', 'user_juns.junta_id', 'juntas.Nombre')
            ->where('juntas.Nombre', 'LIKE', $this->junta)
            ->where('name', 'LIKE', '%' . $this->nombre . '%')
            ->Where('tipo_doc', 'LIKE', '%' . $this->documento . '%')
            ->Where('numero', 'LIKE', '%' . $this->numero . '%')
            ->whereBetween('beneficiarios.edad', [$this->edad_min . '%', $this->edad_max . '%'])
            ->Where('beneficiarios.genero', 'LIKE', '%' . $this->genero . '%')
            ->Where('tipo_salud', 'LIKE', '%' . $this->afiliacion . '%')
            ->Where('salud', 'LIKE', '%' . $this->eps . '%')
            ->Where('discap', 'LIKE', '%' . $this->discapacidad . '%')
            ->Where('nivel_edu', 'LIKE', '%' . $this->edu . '%')
            ->Where('sub_gobierno', 'LIKE', '%' . $this->subsidio . '%')
            ->Where('barrio', 'LIKE',  $this->barrio)
            ->Where('user_id', 'LIKE',  $this->afiliado)
            ->get();

        $pdf = PDF::loadView('pdf.beneficiarios', compact('beneficiarios'))->setPaper('a4', 'landscape')->output();
        return response()->streamDownload(fn () => print($pdf), "Informe_beneficiarios.pdf");
    }
}
