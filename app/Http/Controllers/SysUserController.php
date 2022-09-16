<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SysUserController extends Controller
{
    public function showFormSysUser(){
        // $data = array(
        //     'ID' => '',
        //     'Role' => '',
        //     'ASource' => ''
        // );

        // $responseUser = APIMiddleware($data, 'SearchSysUser');
        // dd($responseUser);

        // if ($responseUser['code'] == '400'){
        //     abort(403,'Something wrong, please contact your Administrator.');
        // }

        if (session('Role') == 'ADMIN'){
            session(['sidebar' => 'sysuser']);
        }else{
            session(['sidebar' => 'master']);
            session(['sidebar-tree' => 'sysuser']);
        }

        return view('Master.SysUser.SysUser');
        // return view('Master.SysUser.SysUser', array('userData' => $responseUser['Data']));
    }

    public function showFormAddSysUser(){
        session(['sidebar' => 'master']);
        session(['sidebar-tree' => 'sysuser']);

        return view('Master.SysUser.AddSysUser');
    }

    public function showMyProfile(){
        $data = array(
            'ID' => session('ID')
        );

        $responseUser = APIMiddleware($data, 'SearchSysUserDet');

        if ($responseUser['code'] == '400'){
            abort(403,'Something wrong, please contact your Administrator.');
        }

        session(['sidebar' => 'top-nav']);

        return view('MyProfile', array('userData' => $responseUser['Data']));
    }

    public function showAgentLevelTree(){
        // $data = array(
        //     'ID' => session('ID')
        // );

        // $responseUser = APIMiddleware($data, 'SearchSysUserDet');

        // if ($responseUser['code'] == '400'){
        //     abort(403,'Something wrong, please contact your Administrator.');
        // }

        session(['sidebar' => 'top-nav']);

        return view('Master.SysUser.AgentTree');
    }

    public function getDataUser(Request $request){
        $data = array(
            'draw' => $request->get('draw'),
            'ID' => $request->get('SearchKey'),
            'Role' => $request->get('Role'),
            'ASource' => '',
            'StartRow' => $request->get('start'),
            'LengthRow' => $request->get('length')
        );

        $responseListUser = APIMiddleware($data,'SearchListSysUserPerPage');

        return $responseListUser;
    }

    public function showResetPassword(Request $request){
        return view('Master.SysUser.ResetPassword',array('ID' => $request->get('ID')));
    }

    public function resetPassword(Request $request){
        $data = array(
            'Username' => session('ID'),
            'Password' => session('Password'),
            'ID' => $request->input('ID'),
            'New_Password' => $request->input('New_Password'),
            'ReType_Password' => $request->input('ReType_Password')
        );

        return APIMiddleware($data,'Reset_Password');
    }
}
