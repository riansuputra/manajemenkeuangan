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

        cookie()->queue(cookie()->forget('token'));
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'x-api-key' => env('API_KEY')
        ])->post(env('API_URL')."/login", $input);

        if ($response->status() == 200) {
            Cookie::queue('token',$response["token"]);
            return redirect()->route('dashboard')->with('success', 'Login Berhasil');
        } else if (!empty($response["message"]) && !empty($response["errors"])) {
            return back()->with('error', $response["message"])->withErrors($response["errors"])->withInput($input);
        } else if (!empty($response["message"])) {
            return back()->with('error', $response["message"])->withInput($input);
        } else {
            return back()->with('error', 'Gagal masuk')->withInput($input);
        }
    }    

    public function dashboardPage(){
        return view('dashboard.index');
    }

    public function logout(){
        $token = request()->cookie('token');
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'x-api-key' => env('API_KEY'),
            'Authorization' => 'Bearer '.$token,
        ])->post(env('API_URL')."/logout");

        // cookie()->queue(cookie()->forget('token'));

        if($response->status() == 200){
            return redirect()->route('loginPage')->with('success','Logout Berhasil');
        }else if(!empty($response["message"]) && !empty($response["errors"])){
            return back()->with('error', $response["message"])->withErrors($response["errors"])->withInput($input);
        }else if(!empty($response["message"])){
            return back()->with('error', $response["message"])->withInput($input);
        }else{
            return back()->with('error', 'Gagal keluar')->withInput($input);
        }
    }

    public function getDataLogin($request){
        $ket ='';
        $user ='';
        if($request->admin){
            $ket ='admin';
            $user = $request->admin;
        }else if($request->user){
            $ket ='user';
            $user = $request->user;
        }
        return ['keterangan' => $ket, 'user' => $user];
    }
    

}
