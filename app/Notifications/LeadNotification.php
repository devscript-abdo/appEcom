<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class LeadNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */

    public $lead;

    public $event;

    public function __construct($lead, $event)
    {

        $this->lead = $lead;
        $this->event = $event;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        // dd('from Tomail',$this->event);
        return (new MailMessage)

            ->subject('New Lead Created')
            ->line('Name: ' . $this->lead->nom)
            ->line('Email: ' . $this->lead->email)
            ->line('Télé: ' . $this->lead->tele)
            ->line('ville: ' . $this->lead->ville)
            ->line('address: ' . $this->lead->address)
            ->line('produit: ' . $this->lead->produit)
            ->line('addedby: ' . $this->lead->addedby)
            ->line('Group: ' . $this->lead->group->name)
            ->line('Thank you for using our application!')
            ->action('Notification Action', url('/'));
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
            //
        ];
    }
}
