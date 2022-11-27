<?php

namespace App\Http\Controllers\Admin;

use App\Models\Checkout;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class StatusController extends Controller
{
    public function update(Request $request){

        $validatedData = $request->validate([
            'status' => 'required',
        ]);

        if($request->status == 'success'){
            $validatedData['tgl_konfirmasi'] = now();
        }
        
        if($request->status == 'process'){
            $request->validate(['estimasi_tiba' => 'required']);
            $validatedData['estimasi_tiba'] = $request->estimasi_tiba;
            if($request->ubah == "1"){
                Checkout::where('id', $request->checkout_id)->update($validatedData);
                return back()->with('ubah_estimasi', 'Berhasil Ubah Tanggal Estimasi Tiba');
            }
        }
        
        if($request->status == 'done'){
            $validatedData['pesanan_sampai'] = now();
        }
        

        Checkout::where('id', $request->checkout_id)->update($validatedData);
        // Alert::success("Berhasil mengubah status!", 'Mengubah status user!');
        return back();
    }
}
