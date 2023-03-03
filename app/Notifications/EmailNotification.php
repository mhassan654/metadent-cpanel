<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class EmailNotification extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    protected $email;
    // protected $subject;
    public function __construct($email)
    {
        $this->email = $email;
        // $this->subject = $subject;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        // return ['mail','database'];
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
    //  * @param  mixed  $notifiable
    //  * @return \Illuminate\Notifications\Messages\MailMessage
    //  */
    // public function toMail($notifiable)
    // {
    //     $url = url()->current().'/patientportal';
    //     return (new MailMessage)
    //             ->subject($this->email['subject'])
    //             // ->line($this->email['message'])
    //             ->markdown('emails.simple', ['url' => $url]);
    // }

    public function toDatabase($notifiable)
    {
        return [
            // "status" => "open",
                'from_details' =>$this->email['from_details'],
                'subject' =>$this->email['subject'],
                'message_id'=>$this->email['message_id'],
                'reply_id'=>$this->email['reply_id'],
                'under_category'=>$this->email['under_category'],
                'sent_at' => $this->email['sent_at'],
                'flag_status' => $this->email['flag_status'],
           
        ];
    }

    /**
     * Get the array representation of the notification.
     *
    //  * @param  mixed  $notifiable
    //  * @return array
     */
    // public function toArray($notifiable)
    // {
    //     return [
    //         // 'subject' => $this->subject
    //         'EmailMetadent' => $this->EmailMetadent
    //     ];
    // }
}
