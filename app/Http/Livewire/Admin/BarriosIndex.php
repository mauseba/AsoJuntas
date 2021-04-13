<?php

namespace App\Http\Livewire\Admin;

use App\Models\Censo\Barrios;
use Livewire\Component;

use Livewire\WithPagination;

class BarriosIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public $search;

    
    public function updatingSearch(){
        $this->resetPage();
    }

    public function render()
    {

        $barrios = Barrios::where('name', 'LIKE', '%' . $this->search .'%' )
                    ->orWhere('id', 'LIKE', '%' . $this->search .'%')
                    ->paginate();

        return view('livewire.admin.barrios-index',compact('barrios'));
    }
}
