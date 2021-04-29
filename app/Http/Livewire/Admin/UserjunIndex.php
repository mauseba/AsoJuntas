<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

use App\Models\UserJun;

use Livewire\WithPagination;

class UserjunIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public $cedul;

    public $search;

    public function render()
    {
        if($this->search){
            $userj = UserJun::join('juntas','user_juns.junta_id', '=','juntas.id')
            ->join('comisions','user_juns.comision_id','=','comisions.id')
            ->select('user_juns.*','juntas.Nombre','comisions.comision')
            ->where('juntas.Nombre', 'LIKE','%' . $this->search . '%')
            ->orWhere('user_juns.nombre', 'LIKE','%' . $this->search . '%')
            ->latest('id')
            ->paginate();   
            
        }elseif($this->cedul){
            $userj = UserJun::join('juntas','user_juns.junta_id', '=','juntas.id')
            ->join('comisions','user_juns.comision_id','=','comisions.id')
            ->select('user_juns.*','juntas.Nombre','comisions.comision')
            ->where('Num_identificacion', 'LIKE','%' . $this->cedul . '%')
            ->latest('id')
            ->paginate();  
            
        }else{
            $userj = UserJun::join('juntas','user_juns.junta_id', '=','juntas.id')
            ->join('comisions','user_juns.comision_id','=','comisions.id')
            ->select('user_juns.*','juntas.Nombre','comisions.comision')
            ->latest('id')
            ->paginate();  
            
        }
      
        return view('livewire.admin.userjun-index',compact('userj'));
        
    }
}
