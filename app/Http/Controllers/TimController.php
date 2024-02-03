<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tim;

class TimController extends Controller
{
    public function index()
    {
        $tims = Tim::all();
        return view('layouts.admin.tim.index', compact('tims'));
    }

    public function create()
    {
        return view('layouts.admin.tim.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'namaTim' => 'required|string',
        ]);

        Tim::create([
            'namaTim' => $request->namaTim,
        ]);

        return redirect()->route('tim.index')->with('success', 'Tim created successfully!');
    }

    public function edit($id)
    {
        $tim = Tim::findOrFail($id);
        return view('layouts.admin.tim.edit', compact('tim'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'namaTim' => 'required|string',
        ]);

        $tim = Tim::findOrFail($id);
        $tim->update([
            'namaTim' => $request->namaTim,
        ]);

        return redirect()->route('tim.index')->with('success', 'Tim updated successfully!');
    }

    public function destroy($id)
    {
        $tim = Tim::findOrFail($id);
        $tim->delete();

        return redirect()->route('tim.index')->with('success', 'Tim deleted successfully!');
    }
}
