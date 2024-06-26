<?php

namespace App\Mail;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class MailRestaurant extends Mailable
{
    use Queueable, SerializesModels;

    public $lead;

    /**
     * Create a new message instance.
     */
    public function __construct($lead)
    {
        $this->lead = $lead;
    }

    public function build()
    {
        $order = Order::orderByDesc('id')->with('dishes')->first();


        return $this->subject('Nuovo ordine')->markdown('mail.mail-restaurant', ['lead' => $this->lead, 'order' => $order]);
    }
}
