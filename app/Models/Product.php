<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function scopeFilter($query, array $filters){
        if(isset($filters['q']) ? $filters['q'] : false){
            return $query->where('name', 'LIKE', '%' . $filters['q'] . '%')
                        ->orWhere('description', 'LIKE', '%' . $filters['q'] . '%')
                        ->orWhere('detail', 'LIKE', '%' . $filters['q'] . '%');
        }
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function order(){
        return $this->belongsTo(Order::class);
    }

    public function in_order(){
        return $this->belongsTo(Order::class);
    }

    public function checkout(){
        return $this->belongsTo(Checkout::class);
    }

    public function categoryProduct(){
        return $this->belongsTo(CategoryProduct::class);
    }

    public function commentProducts(){
        return $this->hasMany(CommentProduct::class);
    }

    public function commentReplyProducts(){
        return $this->hasMany(CommentReplyProduct::class);
    }
}
