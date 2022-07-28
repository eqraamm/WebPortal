<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FAQController extends Controller
{
    public function index(){
        // $data =array(
        //     'Username' => session('ID'),
        //     'Password' => session('Password'),
        //     'ID' => session('ID'),
        //     'RefNo' => '',
        //     'PStatus' => '',
        //     'Insured' => ''
        // );

        session(['sidebar' => 'top-nav']);

        // $responseSearchPolicy = APIMiddleware($data, 'SearchPolicy');

        return view('Master.FAQ.FaqList'); 
        // return view('dashboard')->with('data', $responseSearchPolicy);
    }
}
