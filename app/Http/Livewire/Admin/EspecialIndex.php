<?php

namespace App\Http\Livewire\Admin;

use Livewire\WithPagination;

use App\Models\UserJun;

use Livewire\Component;

class EspecialIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public $search;

    public function render()
    {
        $userj = UserJun::join('juntas','user_juns.junta_id', '=','juntas.id')
        ->join('comisions','user_juns.comision_id','=','comisions.id')
        ->select('user_juns.*','juntas.Nombre','comisions.comision','comisions.Tipo')
        ->where('user_juns.nombre', 'LIKE','%' . $this->search . '%')
        ->where('comisions.Tipo','especial')
        ->latest('id')
        ->paginate();

        return view('livewire.admin.especial-index', compact('userj'));
    }
}
