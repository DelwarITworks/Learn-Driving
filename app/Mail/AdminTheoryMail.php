<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AdminTheoryMail extends Mailable
{
    use Queueable, SerializesModels;

  
    public $adminmails;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($adminmails)
    {
        $this->adminmails = $adminmails;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Your Theory Booking Confirmation')
                    ->view('email.theory.adminmail');
    }
}
