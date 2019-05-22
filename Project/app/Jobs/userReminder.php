<?php

namespace App\Jobs;

use App\Mail\reminderEmail;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class userReminder implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $guest;
    protected $user;
    protected $event;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($user,$event,$guest)
    {
        $this->user = $user;
        $this->event = $event;
        $this->guest = $guest;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        if ($this->user === NULL) {
            Mail::to($this->guest->email)->send(new reminderEmail($this->user,$this->event,$this->guest));
        }elseif($this->guest === NULL){
            Mail::to($this->user->email)->send(new reminderEmail($this->user,$this->event,$this->guest));
        }else{
            return false;
        }
        
    }
}
