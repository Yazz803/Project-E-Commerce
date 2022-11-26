<?php

namespace App\Http\Controllers\User;

use App\Models\CommentProduct;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\CommentReplyProduct;
use RealRashid\SweetAlert\Facades\Alert;

class CommentReplyProductController extends Controller
{
    public function store(Request $request, CommentProduct $commentProduct)
    {
        $validateData = $request->validate([
            'message' => 'required',
        ]);

        $validateData['user_id'] = auth()->user()->id;
        $validateData['product_id'] = $request->product_id;
        $validateData['comment_product_id'] = $commentProduct->id;
        $reply = CommentReplyProduct::create($validateData);

        if($reply){
            Alert::toast('Komentar Berhasil ditambahkan', 'success');
            return redirect()->back();
        }else{
            Alert::toast('Komentar gagal ditambahkan', 'error');
            return redirect()->back();
        }
    }

    public function destroy(CommentReplyProduct $commentReplyProduct)
    {
        CommentReplyProduct::where('id', $commentReplyProduct->id)->delete();

        Alert::toast('Berhasil Hapus Reply', 'success');
        return back();
    }
}
