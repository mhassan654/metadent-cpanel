<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendResetPasswordEmail extends Mailable
{
    use Queueable, SerializesModels;

    private $message_data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($view, $subject, $data = [])
    {
        $this->view = $view;
        $this->subject = $subject;
        $this->data = $data;
        $this->message_data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject($this->subject)
            ->markdown($this->view, $this->message_data)
            ->with($this->data);
    }
}
