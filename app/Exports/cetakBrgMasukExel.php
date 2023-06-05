<?php

namespace App\Exports;

use App\Models\brngmasuk;
use App\Models\tb_brgmasuk;
use Maatwebsite\Excel\Concerns\FromCollection;

class cetakBrgMasukExel implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return tb_brgmasuk::all();
    }
}
