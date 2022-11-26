<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Models\CommentService;
use App\Models\CommentReplyService;
use RealRashid\SweetAlert\Facades\Alert;

class CommentReplyServiceController extends Controller
{
    public function store(Request $request, CommentService $commentService)
    {
        $validateData = $request->validate([
            'message' => 'required',
        ]);

        $validateData['user_id'] = auth()->user()->id;
        $validateData['service_id'] = $request->service_id;
        $validateData['comment_service_id'] = $commentService->id;
        $reply = CommentReplyService::create($validateData);

        if($reply){
            Alert::toast('Komentar Berhasil ditambahkan', 'success');
            return redirect()->back();
        }else{
            Alert::toast('Komentar gagal ditambahkan', 'error');
            return redirect()->back();
        }
    }

    public function destroy(CommentReplyService $commentReplyService)
    {
        CommentReplyService::where('id', $commentReplyService->id)->delete();

        Alert::toast('Berhasil Hapus Reply', 'success');
        return back();
    }
}
