<?php

namespace App\Http\Livewire\Admin;

use App\Models\UserJun;

use Livewire\Component;

use Livewire\WithPagination;

class FiscalIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public $search;

    public function render()
    {
        $userj = UserJun::join('juntas','user_juns.junta_id', '=','juntas.id')
        ->join('comisions','user_juns.comision_id','=','comisions.id')
        ->select('user_juns.*','juntas.Nombre','comisions.comision')
        ->where('user_juns.nombre', 'LIKE','%' . $this->search . '%')
        ->where('Cargo','fiscal')
        ->latest('id')
        ->paginate();

        return view('livewire.admin.fiscal-index',compact('userj'));
    }
}
