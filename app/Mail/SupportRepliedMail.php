<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SupportRepliedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $support; // Dados do suporte

    /**
     * Create a new message instance.
     */
    public function __construct($support)
    {
        $this->support = $support;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Sua dúvida foi respondida',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.supports.replies',
        );
    }
}