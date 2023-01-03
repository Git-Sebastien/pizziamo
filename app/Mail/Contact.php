<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;

class Contact extends Mailable
{
    use Queueable, SerializesModels;

    public $hash_generated;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($hash_generated)
    {
        $this->hash_generated = $hash_generated;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            from: new Address('pizziamo.admin@pizziamo-da-gabriele.fr', 'Administration'),
            subject: 'Clé secréte pour l\'administration du site',
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(

            view: 'mails.token',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}