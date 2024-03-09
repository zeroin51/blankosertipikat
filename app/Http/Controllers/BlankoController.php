<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blanko;

class BlankoController extends Controller
{
    public function index()
    {
        // Mengambil semua data dari tabel Blanko
        $blankos = Blanko::all();

        // Mengembalikan view blanko.blade.php dan melewatkan data blankos ke view
        return view('layouts/admin/blanko', compact('blankos'));
    }
}