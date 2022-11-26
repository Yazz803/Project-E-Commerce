<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentReplyService extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function commentService()
    {
        return $this->belongsTo(CommentService::class);
    }

}
