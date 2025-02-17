<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cookie;

class AuthController extends Controller
{
    public function registerPage()
    {
        return view('autentikasi.register');
    }

    public function register(Request $request)
    {
        $input = array(
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'konfirmasiPassword' => $request->konfirmasiPassword,
        );

        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'x-api-key' => env('API_KEY'),
        ])->post(env('API_URL')."/register", $input);

        if($response->status() == 201){
            return redirect()->route('login.page')->with('success','Berhasil registrasi');
            
        }else{
            $errors = $response->json('errors') ?? [];
            $message = $response->json('message') ?? 'Gagal registrasi.';

            return back()->withErrors($errors)->with('error', $message)->withInput($input);
        }
    }

    public function loginPage()
    {
        return view('autentikasi.login');
    }    

    public function login(Request $request)
    {
        $input = array(
            'email' => $request->email,
            'password' => $request->password,
        );
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'x-api-key' => env('API_KEY')
        ])->post(env('API_URL')."/login", $input);
        // dd($response->json());
        if ($response->status() == 200) {
            Cookie::queue('auth', serialize($response['auth']));
            return redirect()->route('dashboard')->with('success', 'Login Berhasil');
        } 
        elseif ($response->status() == 422 && isset($response['errors'])) {
            return back()->with('error', $response['message'])->withErrors($response['errors'])->withInput($input);
        }
        elseif (!empty($response['message'])) {
            return back()->with('error', $response['message'])->withErrors($response['errors'])->withInput($input);
        }
        return back()->with('error', 'Gagal masuk, coba lagi nanti.')->withErrors($response['errors'])->withInput($input);
    }

    public function lupaPassword(Request $request)
    {
        $input = array(
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'konfirmasiPassword' => $request->konfirmasiPassword,
        );

        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'x-api-key' => env('API_KEY'),
        ])->post(env('API_URL')."/register", $input);

        if($response->status() == 201){
            return redirect()->route('login.page')->with('success','Berhasil registrasi');
            
        }else{
            $errors = $response->json('errors') ?? [];
            $message = $response->json('message') ?? 'Gagal registrasi.';

            return back()->withErrors($errors)->with('error', $message)->withInput($input);
        }
    }

    public function loginAdminPage()
    {
        return view('autentikasi.login_admin');
    }    

    public function loginAdmin(Request $request)
    {
        $input = array(
            'email' => $request->email,
            'password' => $request->password,
        );
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'x-api-key' => env('API_KEY')
        ])->post(env('API_URL')."/admin/login", $input);

        if ($response->status() == 200) {
            Cookie::queue('auth', serialize($response['auth']));
            return redirect()->route('admin.dashboard')->with('success', 'Login Berhasil');
        } else if (!empty($response["message"]) && !empty($response["errors"])) {
            return back()->with('error', $response["message"])->withErrors($response["errors"])->withInput($input);
        } else if (!empty($response["message"])) {
            return back()->with('error', $response["message"])->withInput($input);
        } else {
            return back()->with('error', 'Gagal masuk')->withInput($input);
        }
    }    

    public function dashboardPage(Request $request)
    {
        return view('dashboard.index', [
            'auth' => $request->auth,
        ]);
    }

    public function logout(Request $request)
    {
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'x-api-key' => env('API_KEY'),
            'Authorization' => 'Bearer '. $request->auth['token'],
            'user-type' => $request->auth['user_type'],
        ])->get(env('API_URL')."/logout");

        Cookie::expire('auth');

        if ($response->status() == 200) {
            return redirect('/login')->with('success', 'Logout Berhasil');
        } else if (!empty($response["message"]) && !empty($response["errors"])) {
            return back()->with('error', $response["message"])->withErrors($response["errors"])->withInput($input);
        } else if (!empty($response["message"])) {
            return back()->with('error', $response["message"]);
        } else {
            return back()->with('error', 'Gagal keluar');
        }
    }
}