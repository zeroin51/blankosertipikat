<?php

namespace App\Exports;

use App\Models\Blanko;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class BlankosExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Blanko::all();
    }

    public function headings(): array
    {
        return [
            'No',
            'Nomor Blanko',
            'Nomor Berkas',
            'NIB',
            'Nama Desa',
            'ID Tim',
            'Jenis Berkas',
            'Rusak Pengganti',
            'Created At',
        ];
    }
}
