<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class CertificadoIndex extends Component
{
    public $open = true;
    
    public function render()
    {
        return view('livewire.admin.certificado-index');
    }
}
