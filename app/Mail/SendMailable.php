<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendMailable extends Mailable
{
    use Queueable, SerializesModels;
    public $email;
    public $uuid;
    public $tipo;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email, $uuid, $tipo)
    {
        $this->email = $email;
        $this->uuid = $uuid;
        $this->tipo = $tipo;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.confirmMail');
    }
}