<?php

// app/Http/Controllers/UsersController.php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('layouts.admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('layouts.admin.users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'namaUser' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string',
            'idTim' => 'required|string',
        ]);

        // Hash the password
        $hashedPassword = bcrypt($request->password);

        User::create([
            'namaUser' => $request->namaUser,
            'email' => $request->email,
            'password' => $hashedPassword,
            'idTim' => $request->idTim,
        ]);

        return redirect()->route('users.index')->with('success', 'User created successfully!');
    }
    
    public function edit(User $user)
    {
        return view('layouts.admin.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'namaUser' => 'required|string',
            'password' => 'required|string',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'idTim' => 'required|string',
        ]);

        $user->update($data);

        return redirect()->route('users.index')->withSuccess('User updated successfully!');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index')->withSuccess('User deleted successfully!');
    }
}
