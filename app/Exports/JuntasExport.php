<?php

namespace App\Exports;

use App\Models\Junta;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class JuntasExport implements FromView
{
    
    public function view(): View
    {
        return view('admin.excel.junta', [
            'juntas' => Junta::all()
        ]);
    }
}
