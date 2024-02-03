<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = auth()->user();

        if ($user->isAdmin()) {
            return redirect()->route('admin');
        } else {
            return view('home');
        }
    }

    public function admin()
    {
        return view('layouts/admin/master'); // Adjust the path as per your directory structure
    }
}
