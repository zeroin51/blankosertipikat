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
        $dataPengajuan = Pengajuan::orderBy('nomorBerkas')->get(['nomorBerkas', 'nib', 'namaDesa', 'idTim', 'jenisBerkas', 'totalBidang', 'rusakPengganti']);

        return view('pengajuan.create', compact('dataPengajuan'));
    }

    public function store(Request $request) // Change type-hint to Request
    {
        $dataPengajuan = $request->get('dataPengajuan');

        DB::transaction(function () use ($dataPengajuan) { // Change variable name to match usage
            $ids = collect($dataPengajuan)->pluck('id');
            if (!empty($ids)) {
                Pengajuan::whereNotIn('id', $ids)->delete();
            }

            foreach ($dataPengajuan as $row) { // Change variable name to match usage
                if ($row['id']) {
                    Pengajuan::whereId($row['id'])->update($row);
                } else {
                    Pengajuan::create($row);
                }
            }
        });

        if ($request->expectsJson()) {
            sleep(1);
            $dataPengajuan = Pengajuan::orderBy('NomorBerkas')
                ->get(['id', 'nib', 'namaDesa', 'idTim', 'jenisBerkas', 'totalBidang', 'rusakPengganti', 'status', 'created_at']) // Fix 'create_at' to 'created_at'
                ->transform(function ($item) {
                    return array_values($item->toArray());
                });

            return response()->json($dataPengajuan);
        }

        return redirect()->back()->withSuccess(sprintf("Berhasil menyimpan %d data Pengajuan", count($dataPengajuan)));
    }
}
