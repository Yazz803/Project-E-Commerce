<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
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
        // $dataProvinsi = file_get_contents('https://yazz803.github.io/api-wilayah-indonesia/api/provinces.json');
        // $provinsi = json_decode($dataProvinsi, true);
        
        return view('publik.profile.edit',[
            'ttl_orders' => $ttl_orders,
            // 'provinsi' => $provinsi,
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
            'photo_profile' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->file('photo_profile')){
            // hapus dulu, baru upload yang baru
            if($user->photo_profile != 'user.jpg'){
                File::delete('images/' . $user->photo_profile);
            }
            $image = $request->file('photo_profile');
            $imageName = 'PhotoProfile_'.uniqId().'.'.$image->extension();
            $img = Image::make($image->path());
            $img->fit(200, 200, function($const){
                $const->upsize();
            })->save(public_path('/images/'.$imageName));
            $validatedData['photo_profile'] = $imageName;
        }
        
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
