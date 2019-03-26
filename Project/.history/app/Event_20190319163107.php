<?php

namespace App;

use App\Volunteers;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'events';
    protected $fillable = [
        'title', 'color', 'start_date', 'end_date',
    ];
    public function volunteer()
    {
        return $this->hasMany(Volunteers::class,  'id');
    }
}
