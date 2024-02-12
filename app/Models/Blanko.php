<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blanko extends Model
{
    public function tim()
    {
        return $this->belongsTo(Tim::class, 'idTim');
    }
}