<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

use App\Models\Eps;

use Livewire\WithPagination;

class EpsIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public $search;

    public function updatingSearch(){
        $this->resetPage();
    }
    public function render()
    {
        $eps = Eps::where('name', 'LIKE','%' . $this->search . '%')
        ->latest('id')
        ->paginate();
        
        return view('livewire.admin.eps-index', compact('eps'));
    }
}
