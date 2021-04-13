<?php

namespace App\Http\Livewire\Admin;

use App\Models\UserJun;

use Livewire\Component;

use Livewire\WithPagination;

class DirectivosIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public $search;

    public function render()
    {

        $userj = UserJun::join('juntas','user_juns.junta_id', '=','juntas.id')
        ->join('comisions','user_juns.comision_id','=','comisions.id')
        ->select('user_juns.*','juntas.Nombre','comisions.comision')
        ->where(function($query){
            $query->where('user_juns.nombre', 'LIKE','%' . $this->search . '%')
              ->orWhere('juntas.Nombre', 'LIKE','%' . $this->search . '%');
        })
        ->where(function($query){
            $query->where('Cargo','presidente')
                ->orWhere('Cargo', 'vicepresidente')
                ->orWhere('Cargo', 'secretario')
                ->orWhere('Cargo', 'tesorero');
        })
        ->latest('id')
        ->paginate();

        return view('livewire.admin.directivos-index',compact('userj'));
    }
}
