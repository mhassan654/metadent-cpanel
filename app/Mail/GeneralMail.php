<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class GeneralMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $data;
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // // return env('GENERAL_IMAP_USERNAME');
        // return $this->subject($this->data['subject'])
        // ->from(metadentinf4@outlook.com)
        // ->view('emails.generalmail')
        // ->with($this->data);
        return $this->subject($this->data['subject'])->view('emails.generalmail')->with('data',$this->data);
    }
}
