<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

use App\Models\Junta;

use Livewire\WithPagination;

class JuntasIndex extends Component
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
             $juntas = Junta::where('Vereda', 'LIKE','%' . $this->search . '%')
            ->orWhere('Nit', 'LIKE','%' . $this->search . '%')
            ->latest('id')
            ->paginate();
        }elseif($this->seleccion==1 || $this->seleccion==2){
            $juntas = Junta::where('status', 'LIKE','%' . $this->seleccion . '%')
            ->latest('id')
            ->paginate();
        }else {
            $juntas = Junta::latest('id')
            ->paginate();
        }   
        

        
        return view('livewire.admin.juntas-index',compact('juntas'));
    }
}
