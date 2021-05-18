<?php

namespace App\Http\Livewire\Admin;

use App\Models\UserJun;
use Livewire\Component;
use Barryvdh\DomPDF\Facade as PDF;
use Livewire\WithPagination;

class NoCensadosIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public $nombre;
    public $documento;
    public $junta;

    public function render()
    {
        $censados = UserJun::join('censo', 'user_juns.id', '=', 'censo.user_id')
            ->select('user_juns.*',  'censo.user_id')
            ->pluck('user_id');

        $userj = UserJun::join('juntas', 'user_juns.junta_id', '=', 'juntas.id')
            ->join('comisions', 'user_juns.comision_id', '=', 'comisions.id')
            ->select('user_juns.*', 'juntas.Nombre', 'comisions.comision',  'comisions.Tipo')
            ->where('Num_identificacion', 'LIKE', '%' . $this->documento . '%')
            ->where('user_juns.nombre', 'LIKE', '%' . $this->nombre . '%')
            ->where('juntas.Nombre', 'LIKE', '%' . $this->junta . '%')
            ->whereNotIn('user_juns.id', $censados)
            ->latest('id')
            ->paginate();



        return view('livewire.admin.no-censados-index', compact('userj'));
    }
    public function exportar()
    {
        $censados = UserJun::join('censo', 'user_juns.id', '=', 'censo.user_id')
            ->select('user_juns.*',  'censo.user_id')
            ->pluck('user_id');


        $info = UserJun::join('juntas', 'user_juns.junta_id', '=', 'juntas.id')
            ->join('comisions', 'user_juns.comision_id', '=', 'comisions.id')
            ->select('user_juns.*', 'juntas.Nombre', 'comisions.comision',  'comisions.Tipo')
            ->where('Num_identificacion', 'LIKE', '%' . $this->documento . '%')
            ->where('user_juns.nombre', 'LIKE', '%' . $this->nombre . '%')
            ->where('juntas.Nombre', 'LIKE', '%' . $this->junta . '%')
            ->whereNotIn('user_juns.id', $censados)
            ->orderby('juntas.Nombre', 'ASC')
            ->get();


        $pdf = PDF::loadView('pdf.NoCensados', compact('info'))->setPaper('a4', 'landscape');
        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->stream();
        }, "Informe_AfiliadosNoCensados.pdf");
    }
}
