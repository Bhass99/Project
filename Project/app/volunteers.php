<?php

namespace App;

use App\User;
use App\Event;
use App\Guest;
use Illuminate\Database\Eloquent\Model;

class Volunteers extends Model
{
    protected $fillable = [
        'user_id','event_id','check','permission', 'guest_id'
    ];

    public function users()
    {
        return $this->belongsTo(User::class,  'user_id');
    }
    public function guests()
    {
        return $this->belongsTo(Guest::class,  'guest_id');
    }
    public function events()
    {
        return $this->belongsTo(Event::class,  'event_id');
    }
}
