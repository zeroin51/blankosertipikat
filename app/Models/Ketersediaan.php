<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ketersediaan extends Model
{
    use HasFactory;
    protected $table = 'ketersediaan';
    
    protected $fillable = ['seriBlanko', 'totalBlanko', 'terpakai', 'status'];

    public function addBlanko()
    {
        // Mencari seriBlanko yang aktif
        $seriBlankoAktif = Ketersediaan::where('seriBlanko', $this->seriBlanko)->where('status', 'Aktif')->first();

        // Memeriksa apakah seriBlanko aktif ditemukan
        if (!$seriBlankoAktif) {
            // Jika tidak ditemukan, lemparkan pengecualian atau tangani sesuai kebutuhan aplikasi Anda
            throw new \Exception("No active blanko availability found for seriBlanko: $this->seriBlanko");
        }

        // Mengambil nomor terakhir dari terpakai dan menambahkan 1
        $nomorBlanko = $seriBlankoAktif->terpakai + 1;

        // Membuat nomor_blanko berdasarkan seriBlanko dan nomor terakhir dari terpakai
        $nomorBlankoBaru = $this->seriBlanko . '-' . $nomorBlanko;

        // Menambahkan 1 ke terpakai
        $seriBlankoAktif->increment('terpakai');

        // Menambahkan nomor_blanko baru
        return $nomorBlankoBaru;
    }

}
