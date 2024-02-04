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
        try {
            
            $this->validate($request, [
                'data.*0' => 'required',
                'data.*1*' => 'required',
                'data.*2*' => 'required',
                'data.*3*' => 'required',
                'data.*4*' => 'required',
                'data.*5*' => 'required',
                'data.*6*' => 'required',
                'data.*7*' => 'required',
            ]);

            $dataFromSpreadsheet = $request->input('data');
            // Iterasi setiap baris data dan simpan ke dalam database
            foreach ($dataFromSpreadsheet as $data) {
                Pengajuan::create([
                    'nomorBerkas' => $data[0],
                    'nib' => $data[1],
                    'namaDesa' => $data[2],
                    'idTim' => $data[3],
                    'jenisBerkas' => $data[4],
                    'totalBidang' => $data[5],
                    'rusakPengganti' => $data[6],
                    'status' => $data[7]
                ]);
            }

            return response()->json(['message' => 'Data berhasil disimpan'], 200);
        } catch (\Illuminate\Validation\ValidationException $e) {
            $errors = $e->validator->errors()->all();
            return response()->json(['error' => 'Validation error: ' . implode(', ', $errors)], 422);
        }
         catch (\Exception $e) {
            return response()->json(['error' => 'Gagal menyimpan data: ' . $e->getMessage()], 500);
        }
    }
}
