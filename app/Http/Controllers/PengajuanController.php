<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // Add this line for DB facade
use App\Models\Pengajuan;

class PengajuanController extends Controller
{
    public function index()
    {
        $dataPengajuan = Pengajuan::select('nomorBerkas', 'nib', 'namaDesa', 'jenisBerkas', 'totalBidang', 'rusakPengganti', 'status', 'idTim')
        ->with('tim:id,namaTim') // Eager load the 'tim' relationship with only 'id' and 'namaTim'
        ->get();

        return view('layouts.admin.pengajuan', compact('dataPengajuan'));
    }

    public function create()
    {
        return view('pengajuan.create');
    }

    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'nomorBerkas' => 'required|string',
            'nib' => 'required|string',
            'namaDesa' => 'required|string',
            'idTim' => 'required|integer',
            'jenisBerkas' => 'required|string',
            'totalBidang' => 'required|integer',
            'rusakPengganti' => 'required|string',
            'status' => 'required|string',
        ]);

        // Create a new Pengajuan instance
        $pengajuan = Pengajuan::create($validatedData);

        return redirect()->route('pengajuan.index')->with('success', 'Pengajuan created successfully!');
    }
}
