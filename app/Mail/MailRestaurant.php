<?php

namespace App\Mail;

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
    public function __construct($_lead)
    {
        $this->lead = $_lead;
    }

    /**
     * Get the message envelope.
     */
    public function envelope()
    {
        return new Envelope(
            /* replyTo: $this->lead->address, */
            subject: 'Nuovo contatto',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content()
    {
        return new Content(
            markdown: 'mail.new-contact',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
