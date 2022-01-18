<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class VerifyMail extends Mailable
{
    use Queueable, SerializesModels;
    private $mail;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->mail = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Mail Testing')
            ->view('customer.mail.verify')
            ->with([
                'title' => $this->mail['title'],
                'name' => $this->mail['name'],
                'body' => $this->mail['body'],
                'link' => $this->mail['verifyLink']
            ]);
    }
}
