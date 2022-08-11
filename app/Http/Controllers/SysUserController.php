<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SysUserController extends Controller
{
    public function showFormSysUser(){
        session(['sidebar' => 'master']);
        session(['sidebar-tree' => 'sysuser']);

        return view('Master.SysUser.SysUser');
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
}
