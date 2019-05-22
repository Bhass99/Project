<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class RefuseEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $user;
    public $event;
    public $guest;

    /**
     * Create a new message instance.
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
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.refuse');
    }
}
