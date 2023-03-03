<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SingleInvoiceMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $invoice;
//    public function __construct($invoice)
//    {
//        $this->invoice = $invoice;
//    }
    public $invoiceDetails;
    public function __construct($invoiceDetails)
    {
        $this->invoiceDetails = $invoiceDetails;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
//        return $this->subject('Payment Reminder')
//            ->view('emails.InvoiceMail');
        return $this->view('emails.singleInvoiceMail');
    }
}
