<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ViewPengajuan extends Model
{
    protected $table = 'view_pengajuan';

    protected $fillable = [
        'idTim',
        'kodePengajuan',
        'create_at',
    ];

    public function tim()
    {
        return $this->belongsTo(Tim::class, 'idTim', 'id');
    }
}