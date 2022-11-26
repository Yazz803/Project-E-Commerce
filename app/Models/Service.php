<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function categoryService(){
        return $this->belongsTo(CategoryService::class);
    }

    public function commentServices()
    {
        return $this->hasMany(CommentService::class);
    }

    public function commentReplyServices()
    {
        return $this->hasMany(CommentReplyService::class);
    }
}
