<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BerandaPetugasController extends Controller
{
    public function index()
    {
        return view('petugas.beranda_index');
    }
}
