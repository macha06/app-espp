<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BerandaSiswaController extends Controller
{
    public function index()
    {
        return view('siswa.beranda_index');
    }
}
