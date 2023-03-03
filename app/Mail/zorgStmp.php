<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Log;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class zorgStmp extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $data;
    public function __construct($data_zorg)
    {
        $this->data = $data_zorg;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    // public function build()
    // {
    //     return $this->from('metadentb.v@zorgmail.nl')
    //                 ->view('emails.zorg');
    // }

    public function build()
    {
        $subject = $this->data['subject']; //'This metadent!';
        $address = $this->data['email'];
        $name = $this->data['first_name']; //ssekimuli';

        $headerData = [
            'Contenttype' => 'application/edifact',
        ];

        $header = $this->asString($headerData);

        $this->withSwiftMessage(function ($message) use ($header) {
            $message->getHeaders()
                ->addTextHeader('Content-type', $header);
        });

        $this->from('metadentb.v@zorgmail.nl')
                ->subject($subject)
                ->view('emails.zorg')
            // ->cc($address, $name)
            // ->bcc($address, $name)
            // ->replyTo($address, $name)
            ->with(['details' => $this->data]);
        foreach ($this->data['attachment'] as $file => $v) {
            $this->attach($v);
            // Log::debug($v);
        }
        return $this;
    }

    private function asJSON($data)
    {
        $json = json_encode($data);
        $json = preg_replace('/(["\]}])([,:])(["\[{])/', '$1$2 $3', $json);

        return $json;
    }


    private function asString($data)
    {
        $json = $this->asJSON($data);

        return wordwrap($json, 76, "\n   ");
    }
}
