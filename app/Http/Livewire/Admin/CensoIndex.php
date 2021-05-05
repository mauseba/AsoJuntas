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

class CensoIndex extends Component
{
    use WithPagination;

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



    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $user = UserJun::all();
        $jun = Junta::orderBy('Nombre')->get();
        $barrios = Barrios::orderBy('name')->get();

        $censo = Censo::join('user_juns', 'censo.user_id', '=', 'user_juns.id')
            ->join('juntas', 'juntas.id', '=', 'user_juns.id')
            ->select('censo.*', 'user_juns.nombre', 'user_juns.junta_id', 'juntas.Nombre')
            ->where('juntas.Nombre', 'LIKE', '%' .  $this->junta . '%')
            ->where('barrio', 'LIKE', '%' . $this->barrio . '%')
            ->Where('censo.direccion', 'LIKE', '%' . $this->direccion . '%')
            ->Where('tipo_vivienda', 'LIKE', '%' . $this->tipo_vivienda . '%')
            ->Where('energia', 'LIKE', '%' . $this->energia . '%')
            ->Where('gas', 'LIKE', '%' . $this->gas . '%')
            ->Where('agua', 'LIKE', '%' . $this->agua . '%')
            ->Where('alcantarilla', 'LIKE', '%' . $this->alcantarilla . '%')
            ->Where('sisben', 'LIKE', '%' . $this->sisben . '%')
            ->Where('sub_vivienda', 'LIKE', '%' . $this->sub_vivienda . '%')
            ->Where('piso', 'LIKE', '%' . $this->piso . '%')
            ->Where('techo', 'LIKE', '%' . $this->techo . '%')
            ->Where('pañete', 'LIKE', '%' . $this->pañete . '%')
            ->Where('baños', 'LIKE', '%' . $this->baños . '%')
            ->Where('baño_nuevo', 'LIKE', '%' . $this->baño_nuevo . '%')
            ->Where('vivienda_nueva', 'LIKE', '%' . $this->vivienda_nueva . '%')
            ->Where('sub_gobierno', 'LIKE', '%' . $this->subsidio . '%')
            ->Where('user_id', 'LIKE',  $this->afiliado)
            ->orderBy('id', 'DESC')
            ->paginate();


        return view('livewire.admin.censo-index', compact('censo', 'user', 'jun', 'barrios'));
    }
    public function exportar()
    {
        set_time_limit(300);
        $censo = Censo::join('user_juns', 'censo.user_id', '=', 'user_juns.id')
            ->join('juntas', 'juntas.id', '=', 'user_juns.id')
            ->select('censo.*', 'user_juns.nombre', 'user_juns.junta_id', 'juntas.Nombre')
            ->where('juntas.Nombre', 'LIKE', '%' .  $this->junta . '%')
            ->where('barrio', 'LIKE', '%' . $this->barrio . '%')
            ->Where('censo.direccion', 'LIKE', '%' . $this->direccion . '%')
            ->Where('tipo_vivienda', 'LIKE', '%' . $this->tipo_vivienda . '%')
            ->Where('energia', 'LIKE', '%' . $this->energia . '%')
            ->Where('gas', 'LIKE', '%' . $this->gas . '%')
            ->Where('agua', 'LIKE', '%' . $this->agua . '%')
            ->Where('alcantarilla', 'LIKE', '%' . $this->alcantarilla . '%')
            ->Where('sisben', 'LIKE', '%' . $this->sisben . '%')
            ->Where('sub_vivienda', 'LIKE', '%' . $this->sub_vivienda . '%')
            ->Where('piso', 'LIKE', '%' . $this->piso . '%')
            ->Where('techo', 'LIKE', '%' . $this->techo . '%')
            ->Where('pañete', 'LIKE', '%' . $this->pañete . '%')
            ->Where('baños', 'LIKE', '%' . $this->baños . '%')
            ->Where('baño_nuevo', 'LIKE', '%' . $this->baño_nuevo . '%')
            ->Where('vivienda_nueva', 'LIKE', '%' . $this->vivienda_nueva . '%')
            ->Where('sub_gobierno', 'LIKE', '%' . $this->subsidio . '%')
            ->Where('user_id', 'LIKE',  $this->afiliado)
            ->get();

        $dato = $censo->pluck('user_id');


        $beneficiarios = Beneficiarios::join('user_juns', 'beneficiarios.user_id', '=', 'user_juns.id')
            ->join('juntas', 'juntas.id', '=', 'user_juns.id')
            ->select('beneficiarios.*', 'user_juns.nombre', 'user_juns.junta_id', 'juntas.Nombre')
            ->Where('user_id', 'LIKE', $this->afiliado)
            ->WhereIn('user_id', $dato)
            ->get();

        $pdf = PDF::loadView('pdf.censo', compact('censo', 'beneficiarios'))->setPaper('a4', 'landscape')->output();
        return response()->streamDownload(fn () => print($pdf), "Informe_CensoComunal.pdf");
    }
}
