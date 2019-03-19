<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class volunteers extends Model
{
    protected $fillable = [
        'user_id','event_id','check','permission'
    ];

    public function users()
    {
        return $this->belongsTo(User::class,  'id');
    }
}
