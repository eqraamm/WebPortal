<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StoredDataController extends Controller
{
    public function ShowStoredPolicy(){
        session(['sidebar' => 'stored-data']);
        session(['sidebar-tree' => 'stored-policy']);
        
        return view('StoredData.StoredPolicy');
    }

    public function ShowStoredDocument(Request $request){
        $data = array(
            'UserName' => session('ID'),
            'Password' => session('Password'),
            'ANO' => ($request->get('ANO') == null) ? -1 : $request->get('ANO'),
            'Description' => ($request->get('Description') == null) ? '' : $request->get('Description')
        );

        $response = APIMiddleware($data,'SearchListPolicyPrintLogDocument');

        return view('StoredData.modalStoredDocument',array('response' => $response));
    }

    public function SearchStoredPolicy(Request $request){
        // dd($request);
        $data = array(
            'ID' => session('ID'),
            'Insured' => ($request->input('Insured') == null) ? '' : $request->input('Insured'),
            'PolicyNo' => ($request->input('PolicyNo') == null) ? '' : $request->input('PolicyNo'),
            'EffectiveDate' => ($request->input('EffectiveDate') == null) ? '' : $request->input('EffectiveDate'),
            'EffectiveTime' => ($request->input('EffectiveTime') == null) ? '' : $request->input('EffectiveTime'),
            'Product' => ($request->input('Product') == null) ? '' : $request->input('Product'),
            'Info' => ($request->input('Info') == null) ? '' : $request->input('Info'),
            'RefNo' => ($request->input('RefNo') == null) ? '' : $request->input('RefNo')
        );

        return APIMIddleware($data,'SearchStoredPolicy');
    }

    public function GetPolicyPrintLogDocument(Request $request){
        $data = array(
            'UserName' => session('ID'),
            'Password' => session('Password'),
            'ANO' => ($request->get('ANO') == null) ? -1 : $request->get('ANO'),
            'Description' => ($request->get('Description') == null) ? '' : $request->get('Description')
        );

        return APIMiddleware($data,'SearchPolicyPrintLogDocument');
    }
}
