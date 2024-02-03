<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ketersediaan extends Model
{
    use HasFactory;
    protected $table = 'ketersediaan';
    
    protected $fillable = ['seriBlanko', 'totalBlanko', 'status'];
}
