<?php

namespace App\Exports;

use App\Models\UserJun;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

class UserJunExport implements FromView
{

    public function view(): View
    {
        return view('admin.excel.userjun', [
            'userjuns' => UserJun::all()
        ]);
    }
}
