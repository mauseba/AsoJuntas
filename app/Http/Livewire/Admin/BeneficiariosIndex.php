<?php

namespace App\Http\Livewire\Admin;


use App\Models\Censo\Beneficiarios;
use App\Models\Censo\Eps;
use App\Exports\BeneficiariosExport;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;

use Barryvdh\DomPDF\Facade as PDF;
use Livewire\Component;

use Livewire\WithPagination;

class BeneficiariosIndex extends Component
{
    
    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public $nombre;
    public $documento;
    public $numero;
    public $edad_max = 99;
    public $edad_min;
    public $genero;
    public $afiliacion;
    public $eps;
    public $discapacidad;
    public $edu;
    public $afiliado;

    
    public function updatingSearch(){
        $this->resetPage();
    }

    public function render()
    {
        $eps = Eps::orderBy('name')->get(); // ordenar por nombre
        
        $beneficiarios = Beneficiarios::where('name', 'LIKE', '%' . $this->nombre .'%' )
                    ->Where('tipo_doc', 'LIKE', '%' . $this->documento .'%')
                    ->Where('numero', 'LIKE', '%' . $this->numero .'%')
                    ->whereBetween('edad', [$this->edad_min .'%',$this->edad_max.'%'] )
                    ->Where('genero', 'LIKE', '%' . $this->genero .'%')
                    ->Where('tipo_salud', 'LIKE', '%' . $this->afiliacion .'%')
                    ->Where('salud', 'LIKE', '%' . $this->eps .'%')
                    ->Where('discap', 'LIKE', '%' . $this->discapacidad .'%')
                    ->Where('nivel_edu', 'LIKE', '%' . $this->edu .'%')
                    ->Where('user_id', 'LIKE', '%' . $this->afiliado .'%')
                    ->orderBy('id','DESC')
                    
                    ->paginate(10);
        
        return view('livewire.admin.beneficiarios-index',compact('beneficiarios','eps'));
    }
    public function exportar(){
        set_time_limit(300);  
        $beneficiarios = Beneficiarios::where('name', 'LIKE', '%' . $this->nombre .'%' )
                    ->Where('tipo_doc', 'LIKE', '%' . $this->documento .'%')
                    ->Where('numero', 'LIKE', '%' . $this->numero .'%')
                    ->whereBetween('edad', [$this->edad_min .'%',$this->edad_max.'%'] )
                    ->Where('genero', 'LIKE', '%' . $this->genero .'%')
                    ->Where('tipo_salud', 'LIKE', '%' . $this->afiliacion .'%')
                    ->Where('salud', 'LIKE', '%' . $this->eps .'%')
                    ->Where('discap', 'LIKE', '%' . $this->discapacidad .'%')
                    ->Where('nivel_edu', 'LIKE', '%' . $this->edu .'%')
                    ->get();
          
       $pdf = PDF::loadView('pdf.beneficiarios',compact('beneficiarios'))->setPaper('a4', 'landscape')->output();                
       return response()->streamDownload( fn() => print($pdf),"Informe_beneficiarios.pdf");
    }
    public function exportarXL(){
        
     return Excel::download(new BeneficiariosExport, 'Pdf Data.xlsx');
        
       
    }
    
              
        
    }  

