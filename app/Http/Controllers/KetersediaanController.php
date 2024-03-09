<?php

namespace App\Http\Controllers;

use App\Models\Ketersediaan;
use Illuminate\Http\Request;

class KetersediaanController extends Controller
{
    public function index()
    {
        $ketersediaans = Ketersediaan::all();

        return view('layouts.admin.ketersediaan.index', compact('ketersediaans'));
    }

    public function create()
    {
        return view('layouts.admin.ketersediaan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'seriBlanko' => 'required',
            'totalBlanko' => 'required|integer',
            'status' => 'required',
        ]);

        // Membuat instance Ketersediaan
        $ketersediaan = new Ketersediaan($request->all());

        // Menyimpan data ketersediaan
        $ketersediaan->save();

        // Menambahkan blanko dan mendapatkan nomor_blanko
        $nomorBlanko = $ketersediaan->addBlanko();

        return redirect()->route('ketersediaan.index')->with('success', 'Data ketersediaan created successfully. Nomor blanko: ' . $nomorBlanko);
    }

    public function edit(Ketersediaan $ketersediaan)
    {
        return view('layouts.admin.ketersediaan.edit', compact('ketersediaan'));
    }

    public function update(Request $request, Ketersediaan $ketersediaan)
    {
        $request->validate([
            'seriBlanko' => 'required',
            'totalBlanko' => 'required|integer',
            'status' => 'required',
        ]);

        $ketersediaan->update($request->all());

        return redirect()->route('ketersediaan.index')->with('success', 'Data ketersediaan updated successfully.');
    }

    public function destroy(Ketersediaan $ketersediaan)
    {
        $ketersediaan->delete();

        return redirect()->route('ketersediaan.index')->with('success', 'Data ketersediaan deleted successfully.');
    }
}
