<?php

namespace App\Http\Livewire\Admin;

use App\Models\Psuscripcion;

use Livewire\Component;

use Livewire\WithPagination;


class SuscripcionIndex extends Component
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
        if($this->search){
        $suscr= Psuscripcion::join('juntas','psuscripcions.junta_id', '=','juntas.id')
            ->select('psuscripcions.*','juntas.Nombre')
            ->where('Mes', 'LIKE','%' . $this->search . '%')
            ->orWhere('Nombre', 'LIKE','%' . $this->search . '%')
            ->latest('id')
            ->paginate();
        }elseif($this->seleccion =='suscripcion' || $this->seleccion =='bimestral'){
        $suscr = Psuscripcion::join('juntas','psuscripcions.junta_id', '=','juntas.id')
            ->select('psuscripcions.*','juntas.Nombre')
            ->where('tipo', 'LIKE','%' . $this->seleccion . '%')
            ->latest('id')
            ->paginate();
        
        }else {
        $suscr = Psuscripcion::join('juntas','psuscripcions.junta_id', '=','juntas.id')
            ->select('psuscripcions.*','juntas.Nombre')
            ->latest('id')
            ->paginate();
        }   

        return view('livewire.admin.suscripcion-index',compact('suscr'));
    }
}
