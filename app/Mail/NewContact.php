<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewContact extends Mailable
{
    use Queueable, SerializesModels;

    public $lead;

    //


    public function __construct($lead)
    {
        $this->lead = $lead;
    }


    public function build()
    {
        return $this->subject('Nuovo contatto')->markdown('mail.new-contact', ['lead' => $this->lead]);
    }
}
