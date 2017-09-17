<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CommuterRoute extends Model
{
    protected $table = 'commuter_routes',

    protected $fillable = ['user_id', 'day', 'warning_time', 'time_of_notification'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
