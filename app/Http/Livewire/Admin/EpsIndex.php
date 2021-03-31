<?php

namespace App\Http\Livewire\Admin;

use App\Models\Censo\Eps;
use Livewire\Component;

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

        $eps = Eps::where('name', 'LIKE', '%' . $this->search .'%' )
                    ->orWhere('id', 'LIKE', '%' . $this->search .'%')
                    ->paginate();

        return view('livewire.admin.eps-index',compact('eps'));
    }
}
