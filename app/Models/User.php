<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = ['id'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function scopeFilter($query, array $filters){
        if(isset($filters['u']) ? $filters['u'] : false){
            return $query->where('full_name', 'LIKE', '%' . $filters['u'] . '%')
                        ->orWhere('username', 'LIKE', '%' . $filters['u'] . '%')
                        ->orWhere('email', 'LIKE', '%' . $filters['u'] . '%')
                        ->orWhere('no_hp', 'LIKE', '%' . $filters['u'] . '%')
                        ->orWhere('address', 'LIKE', '%' . $filters['u'] . '%')
                        ->orWhere('role', 'LIKE', '%' . $filters['u'] . '%');
        }
    }

    public function products(){
        return $this->hasMany(Product::class);
    }

    public function services(){
        return $this->hasMany(Service::class);
    }

    // public function getRouteKeyName()
    // {
    //     return 'username';   
    // }

    public function checkout(){
        return $this->hasMany(Checkout::class);
    }
}
