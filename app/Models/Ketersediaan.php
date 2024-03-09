<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ketersediaan extends Model
{
    use HasFactory;
    protected $table = 'ketersediaan';
    
    protected $fillable = ['seriBlanko', 'totalBlanko', 'status'];

    public function addBlanko()
    {
        // Mencari seriBlanko yang aktif
        $seriBlankoAktif = Ketersediaan::where('seriBlanko', $this->seriBlanko)->where('status', 'aktif')->firstOrFail();

        // Mengambil nomor terakhir dari totalBlanko dan menambahkan 1
        $nomorBlanko = $seriBlankoAktif->totalBlanko + 1;

        // Membuat nomor_blanko berdasarkan seriBlanko dan nomor terakhir dari totalBlanko
        $nomorBlankoBaru = $this->seriBlanko . '-' . $nomorBlanko;

        // Menambahkan 1 ke totalBlanko
        $seriBlankoAktif->increment('totalBlanko');

        // Menambahkan nomor_blanko baru
        return $nomorBlankoBaru;
    }
}
