<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MateriController extends Controller
{
    public function ShowMateri()
    {
        checkPrivileges('ALLOWMATERIMENU');
        session(['sidebar' => 'materi']);
        return view('Materi.Materi');
    }
}
