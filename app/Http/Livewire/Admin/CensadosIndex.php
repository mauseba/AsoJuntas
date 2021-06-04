<?php

namespace App\Http\Livewire\Admin;

use App\Models\UserJun;
use Livewire\Component;
use Barryvdh\DomPDF\Facade as PDF;
use Livewire\WithPagination;


class CensadosIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public $nombre;
    public $documento;
    public $junta;


    public function render()
    {
        $userj = UserJun::join('juntas', 'user_juns.junta_id', '=', 'juntas.id')
            ->join('comisions', 'user_juns.comision_id', '=', 'comisions.id')
            ->join('censo', 'user_juns.id', '=', 'censo.user_id')
            ->select('user_juns.*', 'juntas.Nombre', 'comisions.comision', 'censo.user_id', 'comisions.Tipo')
            ->where('Num_identificacion', 'LIKE', '%' . $this->documento . '%')
            ->where('user_juns.nombre', 'LIKE', '%' . $this->nombre . '%')
            ->where('juntas.Nombre', 'LIKE', '%' . $this->junta . '%')
            ->latest('id')
            ->paginate();

        return view('livewire.admin.censados-index', compact('userj'));
    }
    public function exportar()
    {
        $info = UserJun::join('juntas', 'user_juns.junta_id', '=', 'juntas.id')
            ->join('comisions', 'user_juns.comision_id', '=', 'comisions.id')
            ->join('censo', 'user_juns.id', '=', 'censo.user_id')
            ->select('user_juns.*', 'juntas.Nombre', 'comisions.comision', 'censo.user_id', 'comisions.Tipo')
            ->where('Num_identificacion', 'LIKE', '%' . $this->documento . '%')
            ->where('user_juns.nombre', 'LIKE', '%' . $this->nombre . '%')
            ->where('juntas.Nombre', 'LIKE', '%' . $this->junta . '%')
            ->latest('id')
            ->get();



        $pdf = PDF::loadView('pdf.censados', compact('info'))->setPaper('a4', 'landscape');
        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->stream();
        }, "Informe_AfiliadosCensados.pdf");
    }
}
