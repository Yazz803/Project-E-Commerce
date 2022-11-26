<?php

namespace App\Http\Controllers\User;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\CommentProduct;
use App\Models\CommentReplyProduct;
use RealRashid\SweetAlert\Facades\Alert;

class CommentProductController extends Controller
{
    public function store(Request $request, Product $product)
    {
        $validateData = $request->validate([
            'message' => 'required',
        ]);

        $validateData['user_id'] = auth()->user()->id;
        $validateData['product_id'] = $product->id;
        $comment = CommentProduct::create($validateData);

        if($comment){
            Alert::toast('Komentar Berhasil ditambahkan', 'success');
            return redirect()->back();
        }else{
            Alert::toast('Komentar gagal ditambahkan', 'error');
            return redirect()->back();
        }
    }

    public function destroy(CommentProduct $commentProduct)
    {
        CommentReplyProduct::where('comment_product_id', $commentProduct->id)->delete();
        CommentProduct::where('id', $commentProduct->id)->delete();

        Alert::toast('Berhasil Hapus Pesan', 'success');
        return back();
    }
}
