<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tim extends Model
{
    protected $table = 'tim';

    protected $fillable = [
        'namaTim',
    ];

    public function pengajuans()
    {
        return $this->hasMany(Pengajuan::class, 'idTim', 'id');
    }
}
