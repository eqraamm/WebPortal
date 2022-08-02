<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TrainingClassController extends Controller
{
    public function showTrainingClass(){
        session(['sidebar' => 'top-nav']);

        return view('Transaction.TrainingClass');
    }
}
