<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    public function index()
    {
        return view('admin.allUser', [
            'users' => User::latest()->filter(request(['u']))->paginate(30),
        ]);
    }

    public function destroy(User $user){
        $user->delete();
        Alert::toast('Berhasil Menghapus User', 'success');
        return back();
    }
}
