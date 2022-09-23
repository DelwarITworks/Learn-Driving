<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TheoryMail extends Mailable
{
    use Queueable, SerializesModels;
  
    public $theorymail;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($theorymail)
    {
        $this->theorymail = $theorymail;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Your Theory Booking Confirmation')
                    ->view('email.theory.usermail');
    }
}
