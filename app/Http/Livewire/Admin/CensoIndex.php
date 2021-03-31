<?php

namespace App\Http\Livewire\Admin;

use App\Models\Censo\Censo;
use Livewire\Component;

use Livewire\WithPagination;

class CensoIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public $barrio;
    public $direccion;
    public $tipo_vivienda;
    public $energia;
    public $gas;
    public $agua;
    public $alcantarilla;
    public $escrituras;
    public $sisben;
    public $sub_vivienda;
    public $piso;
    public $techo;
    public $pañete;
    public $baños;
    public $baño_nuevo;
    public $vivienda_nueva;


    
    public function updatingSearch(){
        $this->resetPage();
    }

    public function render()
    {

        $censo = Censo::where('barrio', 'LIKE', '%' . $this->barrio .'%' )
                    ->Where('direccion', 'LIKE', '%' . $this->direccion .'%')
                    ->Where('tipo_vivienda', 'LIKE', '%' . $this->tipo_vivienda .'%')
                    ->Where('energia', 'LIKE', '%' . $this->energia .'%')
                    ->Where('gas', 'LIKE', '%' . $this->gas .'%')
                    ->Where('agua', 'LIKE', '%' . $this->agua .'%')
                    ->Where('alcantarilla', 'LIKE', '%' . $this->alcantarilla .'%')
                    ->Where('sisben', 'LIKE', '%' . $this->sisben .'%')
                    ->Where('sub_vivienda', 'LIKE', '%' . $this->sub_vivienda .'%')
                    ->Where('piso', 'LIKE', '%' . $this->piso .'%')
                    ->Where('techo', 'LIKE', '%' . $this->techo .'%')
                    ->Where('pañete', 'LIKE', '%' . $this->pañete .'%')
                    ->Where('baños', 'LIKE', '%' . $this->baños .'%')
                    ->Where('baño_nuevo', 'LIKE', '%' . $this->baño_nuevo .'%')
                    ->Where('vivienda_nueva', 'LIKE', '%' . $this->vivienda_nueva .'%')                
                    ->paginate();

        return view('livewire.admin.censo-index',compact('censo'));
    }

   
}
