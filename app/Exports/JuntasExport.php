<?php

namespace App\Exports;

use App\Models\Junta;
use Maatwebsite\Excel\Concerns\FromCollection;

class JuntasExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Junta::select('*')->get();
    }
}
