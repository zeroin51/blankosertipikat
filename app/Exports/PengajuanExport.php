<?php

namespace App\Exports;

use App\Models\Pengajuan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PengajuanExport implements FromCollection, WithHeadings
{
    protected $kodePengajuan;

    public function __construct($kodePengajuan)
    {
        $this->kodePengajuan = $kodePengajuan;
    }

    public function collection()
    {
        return Pengajuan::where('kodePengajuan', $this->kodePengajuan)->get();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Kode Pengajuan',
            'Nomor Berkas',
            'NIB',
            'Nama Desa',
            'ID Tim',
            'Jenis Berkas',
            'Total Bidang',
            'Rusak Pengganti',
            'Status',
            'Kode Pengajuan',
            'Created At',
            'Updated At',
        ];
    }
}
