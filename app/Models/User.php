<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laratrust\Traits\LaratrustUserTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use LaratrustUserTrait;
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'first_name', 'last_name', 'provider', 'provider_id', 'phone', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static function boot()
    {
        parent::boot();

        self::creating(function ($user) {
            $user->name  =  "{$user->first_name} {$user->last_name}";
        });
    }

    public function commuter_routes()
    {
        return $this->hasMany(CommuterRoute::class, 'user_id');
    }

    public function order()
    {
        return $this->hasMany(Order::class, 'user_id');
    }
    
    public function rating()
    {
        return $this->hasMany(Rating::class, 'user_id');
    }

    public function leader_board()
    {
        return $this->belongsTo(LeaderBoard::class, 'user_id');
    }

    
}
