<?php

namespace App;

use App\User;
use App\Event;
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
    public function events()
    {
        return $this->belongsTo(Event::class,  'id');
    }
}
