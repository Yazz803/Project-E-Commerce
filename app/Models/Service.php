<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function scopeFilter($query, array $filters){
        if(isset($filters['q']) ? $filters['q'] : false){
            return $query->where('name', 'LIKE', '%' . $filters['q'] . '%')
                        ->orWhere('slug', 'LIKE', '%' . $filters['q'] . '%')
                        ->orWhere('description', 'LIKE', '%' . $filters['q'] . '%')
                        ->orWhere('detail', 'LIKE', '%' . $filters['q'] . '%');
        }
    }

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
