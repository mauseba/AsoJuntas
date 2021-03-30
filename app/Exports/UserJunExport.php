<?php

namespace App\Exports;

use App\Models\UserJun;
use Maatwebsite\Excel\Concerns\FromCollection;

class UserJunExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return UserJun::all();
    }
}
