<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        // Check if the user is authenticated
        if (Auth::check()) {
            // Check if the user email is the admin email
            if (Auth::user()->email == 'admin@admin.com') {
                return $this->admin();
            }
        }

        // If not an admin or not authenticated, return the master layout
        return $this->user();
    }

    public function user()
    {
        return view('home');
    }
    public function admin()
    {
        return view('layouts.admin.master');
    }
}
