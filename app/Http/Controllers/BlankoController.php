<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blanko;

class BlankoController extends Controller
{
    public function index()
    {
        // Mengambil semua data dari tabel Blanko
        $blankos = Blanko::with('tim')->get(); // Menggunakan eager loading untuk mendapatkan relasi tim
        
        return view('layouts/admin/blanko', compact('blankos'));
    }
}
