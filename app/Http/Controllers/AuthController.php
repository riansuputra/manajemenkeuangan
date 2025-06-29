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
            return redirect()->route('verification.page')
            ->with('input', $input)
            ->with('success', 'Berhasil registrasi, silakan cek email untuk verifikasi akun.');
        }else{
            $errors = $response->json('errors') ?? [];
            $message = $response->json('message') ?? 'Gagal registrasi.';

            return back()->withErrors($errors)->with('error', $message)->withInput($input);
        }
    }

    public function verificationPage()
    {
        return view('autentikasi.verif_akun', [
            'input' => session('input') // Kirim input dari session ke view
        ]);
    }
    
    public function resendVerification(Request $request)
    {
        $input = array(
            'email' => $request->email,
        );

        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'x-api-key' => env('API_KEY'),
        ])->post(env('API_URL')."/kirim-ulang-verifikasi", $input);

        if($response->status() == 201){
            return redirect()->route('verification.page')
            ->with('input', $input)
            ->with('success', 'Berhasil kirim ulang verifikasi, silakan cek email untuk verifikasi akun.');
        }else{
            $errors = $response->json('errors') ?? [];
            $message = $response->json('message') ?? 'Gagal kirim ulang verifikasi.';

            return back()->withErrors($errors)->with('error', $message)->withInput($input);
        }
    }

    public function verifyEmail(Request $request)
    {
        $code = $request->query('code'); // Ambil kode dari URL
        // dd($code);

        if (!$code) {
            return redirect()->route('login.page')->with('error', 'Kode verifikasi tidak ditemukan.');
        }

        // Kirim request ke backend untuk verifikasi
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'x-api-key' => env('API_KEY')
        ])->get(env('API_URL')."/verifikasi-email/" . $code);

        // dd($response);

        $data = $response->json();
        // dd($data);

        // Redirect ke login page dengan toastr berdasarkan status
        return redirect()->route('login.page')->with($data['status'], $data['message']);
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

    public function passwordPage()
    {
        return view('autentikasi.password', [
            'input' => session('input') // Kirim input dari session ke view
        ]);
    }
    
    public function confirmationPage()
    {
        return view('autentikasi.verif_password', [
            'input' => session('input') // Kirim input dari session ke view
        ]);
    }

    // Route::post('/password/lupa' [AuthController::class, 'sendResetLink']);

    public function lupaPassword(Request $request)
    {
        // dd($request);
        $input = array(
            'email' => $request->email,
        );

        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'x-api-key' => env('API_KEY'),
        ])->post(env('API_URL')."/password/lupa", $input);
        // dd($response->json());
        if($response->status() == 201){
            return redirect()->route('email.confirmation.page')
            ->with('input', $input)
            ->with('success', 'Berhasil mengirim email konfirmasi, silakan cek email untuk konfirmasi ganti password.');
        }else{
            $errors = $response->json('errors') ?? [];
            $message = $response->json('message') ?? 'Gagal mengirim email.';
            // dd($errors, $message, $response->json());
            return back()->with('error', $message);
        }
    }

    public function gantiPasswordForm($token)
    {
        return view('autentikasi.ganti_password', ['token' => $token]);
    }

    public function resendConfirmationPassword(Request $request)
    {
        $input = array(
            'email' => $request->email,
        );
        // dd($input);
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'x-api-key' => env('API_KEY'),
        ])->post(env('API_URL')."/kirim-ulang-konfirmasi", $input);
        // dd($response);

        if($response->status() == 201){
            return redirect()->route('email.confirmation.page')
            ->with('input', $input)
            ->with('success', 'Berhasil kirim ulang konfirmasi ganti password, silakan cek email untuk konfirmasi ganti password.');
        }else{
            $errors = $response->json('errors') ?? [];
            // dd($errors);
            $message = $response->json('message') ?? 'Gagal kirim ulang konfirmasi email.';

            return redirect()->route('password.page')->withErrors($errors)->with('error', $message)->withInput($input);
        }
    }

    public function verifyPassword(Request $request)
    {
        // dd($request);
        $input = array(

            'password' => $request->new_password,
            'confirm_new_password' => $request->confirm_new_password,
        );
        $token = $request->token; // Ambil kode dari URL
        // dd($token);

        if (!$token) {
            return redirect()->route('login.page')->with('error', 'Kode verifikasi tidak ditemukan.');
        }

        // Kirim request ke backend untuk verifikasi
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'x-api-key' => env('API_KEY')
        ])->post(env('API_URL')."/konfirmasi-password/" . $token, $input);

        // dd($request);
        // Redirect ke login page dengan toastr berdasarkan status
        if ($response->status() == 200) {
            // Cookie::queue('auth', serialize($response['auth']));
            return redirect()->route('login.page')->with('success', 'Berhasil ubah password');
        } else if (!empty($response["message"]) && !empty($response["errors"])) {
            return back()->with('error', $response["message"])->withErrors($response["errors"])->withInput($input);
        } else if (!empty($response["message"])) {
            return back()->with('error', $response["message"])->withInput($input);
        } else {
            return back()->with('error', 'Gagal masuk')->withInput($input);
        }
    }

    public function loginAdminPage()
    {
        return view('autentikasi.login_admin');
    }    

    public function loginAdmin(Request $request)
    {
        // dd($request);
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