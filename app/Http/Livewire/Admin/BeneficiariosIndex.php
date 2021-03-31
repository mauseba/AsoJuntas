<?php

namespace App\Http\Livewire\Admin;

use App\Models\Censo\Beneficiarios;
use App\Models\Censo\Eps;
use Livewire\Component;

use Livewire\WithPagination;

class BeneficiariosIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public $nombre;
    public $documento;
    public $numero;
    public $edad ;
    public $genero;
    public $afiliacion;
    public $eps;
    public $discapacidad;
    public $edu;

    
    public function updatingSearch(){
        $this->resetPage();
    }

    public function render()
    {
        $eps = Eps::orderBy('name')->get(); // ordenar por nombre
        
        $beneficiarios = Beneficiarios::where('name', 'LIKE', '%' . $this->nombre .'%' )
                    ->Where('tipo_doc', 'LIKE', '%' . $this->documento .'%')
                    ->Where('numero', 'LIKE', '%' . $this->numero .'%')
                    ->Where('edad', 'LIKE','%'.$this->edad. '%' )
                    ->Where('genero', 'LIKE', '%' . $this->genero .'%')
                    ->Where('tipo_salud', 'LIKE', '%' . $this->afiliacion .'%')
                    ->Where('salud', 'LIKE', '%' . $this->eps .'%')
                    ->Where('discap', 'LIKE', '%' . $this->discapacidad .'%')
                    ->Where('nivel_edu', 'LIKE', '%' . $this->edu .'%')
                    ->paginate();
        

        return view('livewire.admin.beneficiarios-index',compact('beneficiarios','eps'));
    }
}
