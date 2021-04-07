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
        
        /*$userj = UserJun::join('juntas','user_juns.junta_id', '=','juntas.id')
        ->join('comisions','user_juns.comision_id','=','comisions.id')
        ->select('user_juns.*','juntas.Nombre','comisions.comision')
        ->where('Cargo', 'presidente')
        ->where('Cargo', 'vicepresidente')
        ->where('Cargo', 'secretario')
        ->orWhere('Cargo', 'tesorero')
        ->where('user_juns.nombre', 'LIKE','%' . $this->search . '%')
        ->orWhere('Num_identificacion', 'LIKE','%' . $this->search . '%')
        ->latest('id')
        ->paginate();*/

        $userj = UserJun::join('juntas','user_juns.junta_id', '=','juntas.id')
        ->join('comisions','user_juns.comision_id','=','comisions.id')
        ->select('user_juns.*','juntas.Nombre','comisions.comision')
        ->where('user_juns.nombre', 'LIKE','%' . $this->search . '%')
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
