<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{

    use Queueable, SerializesModels;
    public  $data;
    /**
     * Create a new message instance.
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    // public function build()
    // {
    //     return $this->view('emails.contact')
    //     ->with('data',  $this->data)
    //     ->subject( $this->data['subject']);


    // }
    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME')),
            replyTo: [
                new Address('rashasaber199@gmail.com', 'Reply Name'),
            ],
            subject: $this->data['subject'],
        );


        // return new Envelope(
        //     from: new Address('rashasaber199@gmail.com', ' EMY'),
        //     replyTo: [
        //         new Address('rashasaber808@gmail.com', 'AHMED '),
        //     ],
        //     subject: 'OrderCONTACT',
        // );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.contact',
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
