<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ResetPasswordMail extends Mailable
{
    use Queueable, SerializesModels;
    public $user;
    public $host;
    public $resetLink;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $host, $resetLink)
    {
        $this->user = $user;
        $this->host = $host;
        $this->resetLink = $resetLink;
    }
    public function build()
    {
        return $this->from('luongnguyen170102@gmail.com', 'MEO SHOES')
            ->subject('[MEO SHOES] RESET PASSWORD')
            ->view('mail.reset-password');
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: '[MEO SHOES] RESET PASSWORD',
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */


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
