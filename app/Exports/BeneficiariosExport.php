<?php

namespace App\Exports;

use App\Models\Censo\Beneficiarios;
use Maatwebsite\Excel\Concerns\FromCollection;

class BeneficiariosExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Beneficiarios::all();
    }
}
