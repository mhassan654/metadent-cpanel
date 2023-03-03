<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InvoiceMail extends Mailable
{
    use Queueable, SerializesModels;

    public $invoice;
    public $patient;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($invoice, $patient)
    {
        $this->invoice = $invoice;
        $this->patient = $patient;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // return $this->view('view.name');
        return $this->subject('Payment Reminder')
                    ->view('emails.InvoiceMail');
    }
}
