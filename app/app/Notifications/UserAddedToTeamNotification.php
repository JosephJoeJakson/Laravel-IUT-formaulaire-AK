<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class UserAddedToTeamNotification extends Notification
{
    public $addedUser;
    public $addedByUser;

    public function __construct($addedUser, $addedByUser)
    {
        $this->addedUser = $addedUser;
        $this->addedByUser = $addedByUser;
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->line('Vous avez été ajouté à une équipe.')
            ->line('Nom de l\'utilisateur ajouté : ' . $this->addedUser->name)
            ->line('Nom de l\'utilisateur ayant ajouté : ' . $this->addedByUser->name)
            ->line('Date et heure de l\'ajout : ' . now());
    }
}

// class UserAddedToTeamNotification extends Notification
// {
//     use Queueable;

//     /**
//      * Create a new notification instance.
//      */
//     public function __construct()
//     {
//         //
//     }

//     /**
//      * Get the notification's delivery channels.
//      *
//      * @return array<int, string>
//      */
//     public function via(object $notifiable): array
//     {
//         return ['mail'];
//     }

//     /**
//      * Get the mail representation of the notification.
//      */
//     public function toMail(object $notifiable): MailMessage
//     {
//         return (new MailMessage)
//                     ->line('The introduction to the notification.')
//                     ->action('Notification Action', url('/'))
//                     ->line('Thank you for using our application!');
//     }

//     /**
//      * Get the array representation of the notification.
//      *
//      * @return array<string, mixed>
//      */
//     public function toArray(object $notifiable): array
//     {
//         return [
//             //
//         ];
//     }
// }