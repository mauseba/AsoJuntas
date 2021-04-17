<?php

namespace App\Http\Livewire\Admin;

use App\Models\Pcertificado;
use Livewire\Component;
use Livewire\WithPagination;

class CertificadoIndex extends Component
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
        $suscr= Pcertificado::where('FechaP', 'LIKE','%' . $this->search . '%')
        ->orWhere('nombre', 'LIKE','%' . $this->search . '%')
        ->orWhere('Documento', 'LIKE','%' . $this->search . '%')
        ->latest('id')
        ->paginate();

        return view('livewire.admin.certificado-index',compact('suscr'));
    }
}
