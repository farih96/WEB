<?php

namespace App\Notifications;

use App\Reservation;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ReservationResponse extends Notification
{
    use Queueable;

    public $reservation_id;
    public $response; // true or false

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($reser_id,$response)
    {
        $this->reservation_id = $reser_id;
        $this->response = $response;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail','database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $respons = $this->response ? 'accepted' : 'declined';
        $item = Reservation::find($this->reservation_id)->item;

        return (new MailMessage)
                    ->subject('Reservation Response')
                    ->greeting("What's up ".$notifiable->name)
                    ->line('you reservation request about the item '.$item->title.' has been '.$respons)
                    ->line('click the button below to go to our web site.')
                    ->action('GO', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'reservation_id'=>$this->reservation_id,
            'response'=>$this->response,
        ];
    }
}
