<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'username' => 'required|max:255|min:4',
            'email' => 'required|min:2|unique:users',
            'password' => 'required|min:4'
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);

        User::create($validatedData);

        return back();
    }
}
