<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
// use App\User;

class IndexController extends Controller
{

    public function index(){
        $data =array(
            'Username' => session('ID'),
            'Password' => session('Password'),
            'ID' => session('ID'),
            'RefNo' => '',
            'PStatus' => '',
            'Insured' => '',
            'ASource' => session('ASource')
        );      

        session(['sidebar' => 'dashboard']);

        $responseSearchPolicy = APIMiddleware($data, 'SearchPolicy');
        // dd($responseSearchPolicy);
        $dataPolicy = [];
        if ($responseSearchPolicy['code'] == '200'){
            $dataPolicy = $responseSearchPolicy['Data'];
        }
        //  dd($responseSearchPolicy);

        if (session('Role') == 'AGENT'){
            // $data = array(
            //     'ID' => session('ID')
            // );
            // $responseSearchStoredData_GWP = APIMiddleware($data, 'SearchStoredData_GWP');
            // $responseSearchStoredData_LossRatio = APIMiddleware($data, 'SearchStoredData_LossRatio');
            // return view('dashboard.dashboardAgent')->with(array('data_gwp' => $responseSearchStoredData_GWP,'data_lossratio' => $responseSearchStoredData_LossRatio)); 
            return view('dashboard.dashboardMitra');
        }else{
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

            return view('dashboard',array('data'=> $dataPolicy,'listmo' => $dataMO, 'privileges_branch_head' => $privileges)); 
            // return view('dashboard')->with('data', $responseSearchPolicy);
        }
    }

    public function modalWidget(Request $request){
        // dd($request);
        // $status = $request->get('status');
        // $pstatus = '';

        // switch ($status){
        //     case 'waiting':
        //         $pstatus = 'R';
        //         break;
        //     case ($status == 'submit' || $status == 'approved'):
        //         $pstatus = 'P';
        //         break;
        //     case 'cancel':
        //         $pstatus = 'C';
        //         break;
        // }
        // $data = array(
        //     'ID' => session('ID'),
        //     'RefNo' => '',
        //     'PStatus' => $pstatus,
        //     'Insured' => ''
        // );
        // $responseWidget = APIMiddleware($data, "SearchPolicy");
        // dd($responseWidget);
        // return $responseWidget;
        // return view('widgetmodal',array('dataWidget' => $responseWidget));
        return view('widgetmodal');
    }

    public function modalDetailPolicy($PID){
        $dataPolicy = array(
            'PID' => $PID
        );  

        $responsePolicy = APIMiddleware($dataPolicy, 'SearchPolicyByPID');
        // dd($responsePolicy);

        $dataProduct = array(
            'ASource' => session('ASource'),
            'UserName' => session('ID'),
            'Password' => session('Password')
        );
        $responseProduct = APIMiddleware($dataProduct, 'ProductGENHTABByAsource');

        $dataCoverage = array(
            'CoverageID' => $responsePolicy['Data'][0]['CoverageID']
        );
        $responseCoverage = APIMiddleware($dataCoverage, 'SearchCoverage');
        // dd($responseCoverage);
        return view ('Dashboard.modalDetailPolicy', array('data' => $responsePolicy, 'dataproduct' => $responseProduct, 'datacoverage' => $responseCoverage));
    }

    public function getDataGWP(){
        $data = array(
            'ID' => session('ID')
        );
        $responseSearchStoredData_GWP = APIMiddleware($data, 'SearchStoredData_GWP');

        return $responseSearchStoredData_GWP;
    }

    public function getDataLossRatio(){
        $data = array(
            'ID' => session('ID')
        );
        $responseSearchStoredData_LossRatio = APIMiddleware($data, 'SearchStoredData_LossRatio');

        return $responseSearchStoredData_LossRatio;
    }

    public function refreshStoredData(){
        $data = array(
            'ID' => session('ID')
        );
        $responseStoredData = APIMiddleware($data, 'AsyncSearchStoredData');

        return $responseStoredData;
    }

    public function getListPolicy(Request $request){
        // dd($request);
        $data = array(
            'ID' => $request->get('ID') == 'All' ? session('ID') : $request->get('ID'),
            'Username' => $request->get('ID') == 'All' ? session('ID') : '',
            'Password' => $request->get('ID') == 'All' ? session('Password') : '',
            'ASource' => session('ASource')
        );
        $responseSearchPolicy = APIMiddleware($data, 'SearchPolicy');

        return $responseSearchPolicy;
    }
}

