<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blanko extends Model
{
    protected $guarded = ['id'];
    protected $table = 'blanko';

    public function tim()
    {
        return $this->belongsTo(Tim::class, 'idTim');
    }
}