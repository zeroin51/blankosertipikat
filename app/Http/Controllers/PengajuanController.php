<?php

namespace App\Http\Controllers;

use DataTables;
use Carbon\Carbon;
use App\Models\Blanko;
use App\Models\Pengajuan;
use App\Models\Ketersediaan;
use Illuminate\Http\Request;
use App\Models\ViewPengajuan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PengajuanController extends Controller
{
    public function index()
    {
        // $dataPengajuan = Pengajuan::select('id', 'nomorBerkas', 'nib', 'namaDesa', 'jenisBerkas', 'totalBidang', 'rusakPengganti', 'created_at', 'status', 'kodePengajuan', 'idTim')
        // ->with('tim:id,namaTim') // Eager load the 'tim' relationship with only 'id' and 'namaTim'
        // ->get();

        // return view('layouts.admin.pengajuan', compact('dataPengajuan'));

        $dataPengajuan = ViewPengajuan::select('kodePengajuan', 'idTim', 'created_at')
            ->orderBy('created_at', 'desc') // Mengurutkan berdasarkan created_at
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
            ]);
            // Mendapatkan user yang sedang login
            $user = Auth::user();
        
            // Mendapatkan idTim dari user yang sedang login
            $idTim = $user->idTim;
            // Mendapatkan tanggal saat ini
            $tanggalSekarang = Carbon::now()->format('Y-m-d H:i:s');
        
            // Membuat kode pengajuan dengan format idTim-tanggalSekarang
            $kodePengajuan = $idTim . '-' . $tanggalSekarang;

            $dataStatus = "Menunggu";
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
                    'status' => $dataStatus,
                    'kodePengajuan' => $kodePengajuan
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

    public function changeStatus($kodePengajuan)
    {
        try {

            
            // Ubah status pengajuan
            // $pengajuan = Pengajuan::where('kodePengajuan', $kodePengajuan)->update(['status' => 'ACC']);
            $pengajuan = Pengajuan::where('kodePengajuan', $kodePengajuan);
            $pengajuan_data = $pengajuan->get();
            
            foreach ($pengajuan_data as $data) {
                $nomorBlankoBaru = Ketersediaan::where('status', 'Aktif')->first()->addBlanko();
                Blanko::create([
                    'nomorBlanko' => $nomorBlankoBaru,
                    'nomorBerkas' => $data->nomorBerkas,
                    'nib' => $data->nib,
                    'namaDesa' => $data->namaDesa,
                    'idTim' => $data->idTim,
                    'jenisBerkas' => $data->jenisBerkas,
                    'totalBidang' => $data->totalBidang,
                    'rusakPengganti' => $data->rusakPengganti,
                    'kodePengajuan' => $kodePengajuan
                ]);
            }
            $pengajuan->update(['status' => 'ACC']);

            return response()->json(['message' => 'Status pengajuan berhasil diubah', 'pengajuan' => $pengajuan_data], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Gagal mengubah status pengajuan: ' . $e->getMessage()], 500);
        }
    }

    public function detail($kodePengajuan)
    {
        try {
            $detailPengajuan = Pengajuan::where('kodePengajuan', $kodePengajuan)->get();

            return view('layouts/admin/detail_pengajuan', compact('detailPengajuan'));
        } catch (\Exception $e) {
            return response()->json(['error' => 'Gagal mendapatkan detail pengajuan: ' . $e->getMessage()], 500);
        }
    }

    public function destroy(Pengajuan $pengajuan)
    {
        $pengajuan->delete();

        return redirect()->route('pengajuan')->withSuccess('Pengajuan Ditolak!');
    }
}
