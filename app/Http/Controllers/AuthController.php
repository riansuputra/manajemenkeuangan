<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cookie;

class AuthController extends Controller
{
    public function registerPage(){
        return view('autentikasi.register');
    }

    public function register(Request $request){
        $input = array(
            'email' => $request->email,
            'password' => $request->password,
            'name' => $request->name,
        );

        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'x-api-key' => env('API_KEY'),
        ])->post(env('API_URL')."/register", $input);

        if($response->status() == 200){
            return redirect()->route('loginPage')->with('success','Berhasil registrasi');
            
        }else{
            return back()->with('error', $response["message"])->withInput($input);
            
        }
    }

    public function loginPage(){
        return view('autentikasi.login');
    }    

    public function login(Request $request){
        $input = array(
            'email' => $request->email,
            'password' => $request->password,
        );
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'x-api-key' => env('API_KEY')
        ])->post(env('API_URL')."/login-user", $input);

        if ($response->status() == 200) {
            Cookie::queue('auth', serialize($response['auth']));
            return redirect()->route('dashboard')->with('success', 'Login Berhasil');
        } else if (!empty($response["message"]) && !empty($response["errors"])) {
            return back()->with('error', $response["message"])->withErrors($response["errors"])->withInput($input);
        } else if (!empty($response["message"])) {
            return back()->with('error', $response["message"])->withInput($input);
        } else {
            return back()->with('error', 'Gagal masuk')->withInput($input);
        }
    }

    public function loginAdminPage(){
        return view('autentikasi.loginAdmin');
    }    

    public function loginAdmin(Request $request){
        $input = array(
            'email' => $request->email,
            'password' => $request->password,
        );
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'x-api-key' => env('API_KEY')
        ])->post(env('API_URL')."/login-admin", $input);

        if ($response->status() == 200) {
            Cookie::queue('auth', serialize($response['auth']));
            return redirect()->route('admin-layout')->with('success', 'Login Berhasil');
        } else if (!empty($response["message"]) && !empty($response["errors"])) {
            return back()->with('error', $response["message"])->withErrors($response["errors"])->withInput($input);
        } else if (!empty($response["message"])) {
            return back()->with('error', $response["message"])->withInput($input);
        } else {
            return back()->with('error', 'Gagal masuk')->withInput($input);
        }
    }    

    public function dashboardPage(Request $request){
        // $res = Parent::getDataLogin($request);
        // dd($res);

        return view('dashboard.index', [
            'auth' => $request->auth,
        ]);
    }

    public function logout(Request $request){
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'x-api-key' => env('API_KEY'),
            'Authorization' => 'Bearer '. $request->auth['token'],
            'user-type' => $request->auth['user_type'],
        ])->post(env('API_URL')."/logout-user");

        Cookie::expire('auth');

        if($response->status() == 200){
            return redirect()->route('loginPage')->with('success','Logout Berhasil');
        }else if(!empty($response["message"]) && !empty($response["errors"])){
            return back()->with('error', $response["message"])->withErrors($response["errors"])->withInput($input);
        }else if(!empty($response["message"])){
            return back()->with('error', $response["message"]);
        }else{
            return back()->with('error', 'Gagal keluar');
        }
    }

    
    

}
