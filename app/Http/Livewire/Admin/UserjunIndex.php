<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

use App\Models\UserJun;

use Livewire\WithPagination;

class UserjunIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public $search;

    public function render()
    {
        $userj = UserJun::join('juntas','user_juns.junta_id', '=','juntas.id')
        ->select('user_juns.*','juntas.Nombre')
        ->where('user_juns.nombre', 'LIKE','%' . $this->search . '%')
        ->orWhere('Num_identificacion', 'LIKE','%' . $this->search . '%')
        ->latest('id')
        ->paginate();

        return view('livewire.admin.userjun-index',compact('userj'));
    }
}
