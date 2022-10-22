<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index', [
            'title' => 'Login'
        ]);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if(Auth::attempt($credentials, $request->get('remember'))){
            $request->session()->regenerate();  
            Alert::success('Login Berhasil!', ' ');
            return redirect()->intended('/');
        }

        Alert::warning('Login Gagal!', 'Silahkan masukan email dan password yang benar');

        return back();
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        Alert::toast('Anda telah logout!', 'warning');
        return redirect('/');
    }
}