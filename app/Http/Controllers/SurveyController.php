<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Mail\EmailWebSurvey;
// use App\User;

class SurveyController extends Controller
{

    public function showsurvey(){
        $data =array(
            'Username' => session('ID'),
            'Password' => session('Password'),
            'ID' => session('ID'),
            'RefNo' => '',
            'PStatus' => '',
            'Insured' => '',
            'ASource' => session('ASource')
        );

        $responseSearchPolicy = APIMiddleware($data, 'SearchPolicy');

        $dataPrivileges = array(
            'Username' => session('ID'),
            'Password' => session('Password'),
            'FName' => 'ALLOWALLPRODUCTIONBRANCH'
        );  
        $responsePrivileges = APIMiddleware($dataPrivileges, 'CheckPrivileges');

        $privileges = $responsePrivileges['code'] == '200';
        $dataMO = [];

        if ($privileges){
            $data = array(
                'Username' => session('ID'),
                'Password' => session('Password'),
                'ID' => session('ID')
            );
            $responseListMO = APIMIddleware($data,'SearchListMOByBranchUser');
            if ($responseListMO['code'] == '200'){
                $dataMO = $responseListMO['Data'];
            }
        }

        session(['sidebar' => 'survey']);
        //  dd($responseSearchPolicy);
        return view('survey', array('data' => $responseSearchPolicy,'listmo' => $dataMO, 'privileges_branch_head' => $privileges));
    }

    public function SubmitSurvey(Request $request){
        // dd($request);
        $datasurvey = array(
            "PID" => $request->input('PID'),
            'SurveyDate' => date_format(date_create($request->input('SurveyDate')),"Y-m-d"),
            'SurveyTime' => $request->input('SurveyTime')
        );
        
        $responseSendSurvey = APIMiddleware($datasurvey, 'SubmitSurvey');
        // dd($responseSendSurvey);
        
        return response()->json(['code' => $responseSendSurvey['code'],'message'=>$responseSendSurvey['message'],'data' => $responseSendSurvey['Data']]);
    }

    public function CopyLinkSurvey(Request $request){
        $datasurvey = array(
            "PID" => $request->input('PID'),
            "URLType" => $request->input('URLType')
        );
        
        $responseSendSurvey = APIMiddleware($datasurvey, 'GenerateURLS');
        
        return response()->json(['code' => $responseSendSurvey['code'],'message'=>$responseSendSurvey['message'],'data' => $responseSendSurvey['Data']]);
    }

    public function SurveyOnline(Request $request){
        $dataPolicy = array(
            "PID"=> $request->get('id')
        );
        $resposeFlagSurvey = APIMiddleware($dataPolicy, 'SearchPolicyByPID');
        $flagsurvey = $resposeFlagSurvey['Data'][0]['SurveyF'];
        if ($flagsurvey != true){
            return view('Survey.VideoCall');
        } else {
            echo "<script>alert('You Cant Access This URL');</script>";
            echo "<script>window.close();</script>";
        }
    }

    public function SaveSurveyDocument(Request $request){
        $policypic = $request->input('PolicyPIC');

        $datapic = array(
            'PID'=> $request->input('PID'),
            'PolicyPIC'=> $policypic
        );

        $responseSavePolicyDocument = APIMiddleware($datapic, 'SavePolicyDocument');
        return response()->json(['code' => $responseSavePolicyDocument['code'],'message'=>$responseSavePolicyDocument['message']]);
    }

    public function FinishSurvey(Request $request){
        $datasurvey = array(
            'PID'=> $request->input('PID'),
            'ActualDate'=> $request->input('ActualDate'),
            'StartTimeSurvey'=> $request->input('StartTimeSurvey'),
            'EndTimeSurvey'=> $request->input('EndTimeSurvey')
        );
        $responseFinishSurvey = APIMiddleware($datasurvey, 'FinishSurvey');
        //dd($responseFinishSurvey);
        return response()->json(['code' => $responseFinishSurvey['code'],'message'=>$responseFinishSurvey['message'],'data' => $responseFinishSurvey['Data']]);

    }
}

