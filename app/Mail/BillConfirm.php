<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class BillConfirm extends Mailable
{
    use Queueable, SerializesModels;
    public $userEmail;
    public $products;
    public $userName;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($userEmail, $userName, $products)
    {
        $this->userEmail = $userEmail;
        $this->products = $products;
        $this->userName = $userName;
    }
    public function build()
    {
        return $this->from('luongnguyen170102@gmail.com', 'MEO SHOES')
            ->subject('[MEO SHOES] ORDER CONFIRMATION')
            ->view('mail.bill-confirm');
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: '[MEO SHOES] ORDER CONFIRMATION',
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
