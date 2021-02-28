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

    public function updatingSearch(){
        $this->resetPage();
    }

    public function render()
    {
        $juntas = Junta::where('Vereda', 'LIKE','%' . $this->search . '%')
        ->orWhere('Nit', 'LIKE','%' . $this->search . '%')
        ->latest('id')
        ->paginate();
        
        
        return view('livewire.admin.juntas-index',compact('juntas'));
    }
}
