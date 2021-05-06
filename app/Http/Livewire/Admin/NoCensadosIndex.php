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

    public $search;

    public function render()
    {
        $userj = UserJun::join('juntas', 'user_juns.junta_id', '=', 'juntas.id')
            ->join('comisions', 'user_juns.comision_id', '=', 'comisions.id')
            ->join('censo', 'user_juns.id', '!=', 'censo.user_id')
            ->select('user_juns.*', 'juntas.Nombre', 'comisions.comision', 'censo.user_id',)
            ->where('Num_identificacion', 'LIKE', '%' . $this->search . '%')
            ->orWhere('juntas.Nombre', 'LIKE', '%' . $this->search . '%')
            ->latest('id')
            ->paginate();

        return view('livewire.admin.censados-index', compact('userj'));
    }
    public function exportar()
    {
        $userj = UserJun::join('juntas', 'user_juns.junta_id', '=', 'juntas.id')
            ->join('comisions', 'user_juns.comision_id', '=', 'comisions.id')
            ->join('censo', 'user_juns.id', '!=', 'censo.user_id')
            ->select('user_juns.*', 'juntas.Nombre', 'comisions.comision', 'censo.user_id')
            ->get();



        $pdf = PDF::loadView('pdf.censo', compact('userj'))->setPaper('a4', 'landscape')->output();
        return response()->streamDownload(fn () => print($pdf), "Informe_CensoComunal.pdf");
    }
}
