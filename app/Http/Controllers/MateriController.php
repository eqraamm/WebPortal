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

    public function ShowModalLearning(Request $request)
    {
        $data = array(
            'learningobejctID' => $request->learningobejctID,
            'bahasa' => $request->bahasa,
            'desc' => $request->desc,
            'downloaditem1' => $request->downloaditem1,
        );
        return view('Materi.modalDetailLearningObject', array('data' => $data));
    }
}
