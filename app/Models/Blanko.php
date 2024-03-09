<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blanko extends Model
{
    protected $table = 'blanko';

    protected $fillable = [
        'nomorBlanko',
        'nomorBerkas',
        'nib',
        'namaDesa',
        'idTim',
        'jenisBerkas',
        'rusakPengganti',
        'create_at',
        'update_at',
    ];
    
    public function tim()
    {
        return $this->belongsTo(Tim::class, 'idTim');
    }
}