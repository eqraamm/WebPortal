<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Validator;
use Hash;
use Session;
use App\User;

class AuthController extends Controller
{
    //
    public function showFormLogin()
    {
        // $date1=date_create("03/15/2022");
        // $date2=date_create("03/25/2022");
        // $diff=date_diff($date1,$date2);
        // dd($diff->days);
        if (session('login')) { // true sekalian session field di users nanti bisa dipanggil via Auth
            //Login Success
            return redirect()->route('dashboard');
        }
        return view('login');
    }

    public function showFormWelcome(){
        return view("dashboard");
    }
 
    public function login(Request $request)
    {
        // dd($request);
        $rules = [
            'username' => 'required',
        ];
 
        $messages = [
            'username.required' => 'Username wajib diisi',
        ];
 
        $validator = Validator::make($request->all(), $rules, $messages);
 
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        $data = array (
            'username' => $request->input('username'),
            'password' => $request->input('password'),
        );
        // dump($data);
        // dd($data);

        $response  = APIMiddleware($data, 'Login');
        // dd($response);  
        // return $response;
        // dump($response['message']); 
        // dd(strpos($response['message'],'Cmd-Change Password'));
        // if (strpos('<Cmd-Change Password>'))

        if ($response['code'] == '200'){
            $data = array (
                'ID' => $request->input('username'),
            );

            $responseUser = APIMiddleware($data, 'SearchSysUserDet');
            if ($responseUser['code'] == '200'){
                $todayDate = date_create(date("m/d/Y"));
                $last_update = date_create($responseUser['Data'][0]['Last_Update']);
                $licenseExpiry = date_create($responseUser['Data'][0]['LicenseExpiry']);
                $diff=date_diff($last_update,$todayDate);
                
                if ($responseUser['Data'][0]['Role'] == 'AGENT' && $responseUser['Data'][0]['LicenseNo'] == '' && $diff->days > 180){
                    Session::flash('error', 'Your Agent ID is inactive, please contact Agency!');
                    return redirect()->route('login');
                }else if ($responseUser['Data'][0]['Role'] == 'AGENT' && $licenseExpiry < $todayDate){
                    Session::flash('error', 'Your Agent license is Expired');
                    return redirect()->route('login');
                }else{
                    session(['login' => true]);
                    session(['ID' => $responseUser['Data'][0]['ID']]);
                    session(['Name' => $responseUser['Data'][0]['Name']]);
                    session(['Role' => $responseUser['Data'][0]['Role']]);
                    session(['Password' => $request->input('password')]);
                    session(['ASource' => $responseUser['Data'][0]['ASource']]);
                    if ($responseUser['Data'][0]['Role'] == 'ADMIN'){
                        return redirect()->route('master.ShowSysUser');
                    }else{
                        return redirect()->route('dashboard');
                    }
                }
            }else{
                Session::flash('error', 'Invalid UserID/Password');
                return redirect()->route('login');
            }
        }else{
            if (strpos($response['message'],'Cmd-Change Password') > 0){
                session(['Reset_PasswordF' => true]);
                session(['ID' => $request->input('username')]);
                session(['Password' => $request->input('password')]);
                Session::flash('error', 'Please Update Your Password.');
                return redirect()->route('showresetPassword');
            }else{
                Session::flash('error', $response['message']);
                return redirect()->route('login');
            }
        }
    }
        
 
    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect()->route('login');
    }

    public function ShowChangePassword(){
        return view('ChangePassword');
    }

    public function ChangePassword(Request $request){
        // dd($request);
        $data = array (
            'Username' => session('ID'),
            'Password' => session('Password'),
            'Old_Password' => $request->input('Old_Password'),
            'New_Password' => $request->input('New_Password'),
            'ReType_Password' => $request->input('ReType_Password'),
        );

        $response  = APIMiddleware($data, 'Change_Password');
        // dd($response);
        if ($response['code'] == '200'){
            $request->session()->flush();
            Session::flash('success', $response['message']);
            return redirect()->route('login');
        }else{
            if (session('Reset_PasswordF')){
                Session::flash('error', $response['message']);
                return redirect()->route('showresetPassword');
            }else{
                Session::flash('error', $response['message']);
                return redirect()->route('showchangepassword');
            }
            
        }
    }

    public function showForgotPassword(){
        return view('ForgotPassword');
    }

    public function forgotPassword(Request $request){
        $data = array (
            'Username' => $request->input('username')
        );

        $response  = APIMiddleware($data, 'Forgot_Password');

        if ($response['code'] == '200'){
            Session::flash('success', $response['message']);
            return redirect()->route('login');
        }else{
            Session::flash('error', $response['message']);
            return redirect()->route('forgotpassword');
        }
    }
}
