<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class RegisterController extends Controller
{
    public function index()
    {
        return view('publik.login.register', [
            'title' => 'Register',
        ]);
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'username' => 'required|min:4|unique:users|alpha_num|max:10',
            'email' => 'required|min:2|unique:users',
            'password' => 'required|min:4',
            'full_name' => 'required|min:4'
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);

        User::create($validatedData);

        Alert::toast('Register Berhasil! Silahkan Login :)', 'success');

        return redirect()->route('login.index');
    }

    //
}
