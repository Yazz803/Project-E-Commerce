<?php

namespace App\Http\Controllers\Admin;

use App\Models\Checkout;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class StatusController extends Controller
{
    public function update(Request $request){
        $validatedData = $request->validate([
            'status' => 'required'
        ]);

        Checkout::where('id', $request->checkout_id)->update($validatedData);
        Alert::success("Berhasil mengubah status!", 'Mengubah status user!');
        return back();
    }
}
