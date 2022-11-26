<?php

namespace App\Http\Controllers\User;

use App\Models\CommentReplyService;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Models\CommentService;
use RealRashid\SweetAlert\Facades\Alert;

class CommentServiceController extends Controller
{
    public function store(Request $request, Service $service)
    {
        $validateData = $request->validate([
            'message' => 'required',
        ]);

        $validateData['user_id'] = auth()->user()->id;
        $validateData['service_id'] = $service->id;
        $comment = CommentService::create($validateData);

        if($comment){
            Alert::toast('Komentar Berhasil ditambahkan', 'success');
            return redirect()->back();
        }else{
            Alert::toast('Komentar gagal ditambahkan', 'error');
            return redirect()->back();
        }
    }

    public function destroy(CommentService $commentService)
    {
        CommentReplyService::where('comment_service_id', $commentService->id)->delete();
        CommentService::where('id', $commentService->id)->delete();

        Alert::toast('Berhasil Hapus Pesan', 'success');
        return back();
    }
}
