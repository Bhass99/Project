<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class reminderEmail extends Mailable
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
        return $this->from('info@gvimpala.nl')
                ->subject('Herinneringsmail')
                ->markdown('mails.reminder');
    }
}
