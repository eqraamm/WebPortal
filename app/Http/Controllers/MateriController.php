<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MateriController extends Controller
{
    public function ShowMateri()
    {
        session(['sidebar' => 'Materi']);
        return view('Materi.Materi');
    }
}
