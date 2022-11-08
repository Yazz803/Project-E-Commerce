<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        // auth()->check() == true ? $ttl_orders = Order::where('user_id', auth()->user()->id)->count() : $ttl_orders = 0;
        // return view('publik.profile',[
        //     'ttl_orders' => $ttl_orders,
        //     'title' => 'Edit Profile',
        //     'user' => $user,
        // ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        auth()->check() == true ? $ttl_orders = Order::where('user_id', auth()->user()->id)->count() : $ttl_orders = 0;
        return view('publik.profile',[
            'ttl_orders' => $ttl_orders,
            'title' => 'Edit Profile',
            'user' => auth()->user(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $user = auth()->user();
        $validatedData = $request->validate([
            'full_name' => 'required',
            'username' => 'required',
            'email' => 'required',
            'no_hp' => 'required',
            'address' => 'required',
        ]);
        User::where('id', $user->id)->update($validatedData);
        Alert::success('Berhasil Update Profile');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
