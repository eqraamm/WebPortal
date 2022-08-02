<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FAQController extends Controller
{
    public function index(){
        $data =array(
            'Username' => session('ID'),
            'Password' => session('Password'),
            'CategoryID' => '',
        );

        $SearchListCategoryFAQ = APIMiddleware($data, 'SearchListCategoryFAQ');

        if ($SearchListCategoryFAQ['code'] == '400'){
            abort(403,'Something wrong, please contact your Administrator.');
        }

        $data = array(
            'Username' => session('ID'),
            'Password' => session('Password'),
            'FAQID' => '',
            'CategoryID' => '',
        );

        $SearchListFAQ = APIMiddleware($data, 'SearchListFAQ');

        if ($SearchListFAQ['code'] == '400'){
            abort(403,'Something wrong, please contact your Administrator.');
        }

        session(['sidebar' => 'faq']);

        return view('Master.FAQ.FaqList', array('dataCategory' => $SearchListCategoryFAQ['Data'], 'dataFAQ' => $SearchListFAQ['Data'])); 
    }
}
