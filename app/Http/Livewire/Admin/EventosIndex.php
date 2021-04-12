<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

use App\Models\Acta;
use App\Models\Evento;
use Livewire\WithPagination;

class EventosIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public $search;
    
    public $seleccion;

    public function updatingSearch(){
        $this->resetPage();
    }
    public function render()
    {
        $eventos = Evento::join('actas','actas.evento_id','=','eventos.id')
        ->select('actas.*','eventos.Fecha','eventos.Asunto')
        ->where('eventos.Fecha', 'LIKE','%' . $this->search . '%')
        ->orWhere('eventos.Asunto', 'LIKE','%' . $this->search . '%')
        ->latest('id')
        ->paginate();
        
        return view('livewire.admin.eventos-index',compact('eventos'));
    }
}
