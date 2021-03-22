<?php

namespace App\Mail;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactFormMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public function __construct($data)
    {
        $this->user = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('noreply@speus.com')
            ->markdown('contact_email')
            ->with([
                'subject' => $this->user['subject'],
                'message' => $this->user['message'],
                'email' => $this->user['email'],
                'phone_number' => $this->user['phone_number'],
                'fullname' => $this->user['fullname'],
            ]);
    }
}
