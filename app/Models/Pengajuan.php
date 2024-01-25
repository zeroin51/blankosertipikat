<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengajuan extends Model
{
    protected $table = 'pengajuan';

    protected $fillable = [
        'nomorBerkas',
        'nib',
        'namaDesa',
        'idTim',
        'jenisBerkas',
        'totalBidang',
        'rusakPengganti',
        'status',
        'create_at',
        'update_at',
    ];

    public function dataPengajuan()
    {
        return $this->hasOne(Pengajuan::class);
    }

    public function tim()
    {
        return $this->belongsTo(Tim::class, 'idTim');
    }
}
