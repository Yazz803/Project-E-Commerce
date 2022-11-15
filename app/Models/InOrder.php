<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InOrder extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function checkout () {
        return $this->belongsTo(Checkout::class);
    }

    public function product() {
        return $this->belongsTo(Product::class);
    }
}
