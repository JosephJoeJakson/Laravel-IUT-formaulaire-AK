<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Notifiable;

class UserAddedToTeamNotification extends Notification
{
    protected $team;
    protected $user;

    public function __construct($team, $user)
    {
        $this->team = $team;
        $this->user = $user;
    }

    public function via(object $notifiable) {
        return ['mail', 'database'];
    }

    public function toArray(object $notifiable): array {
        return [

        ];
    }
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->line('L\'utilisateur ' . $this->user->name . ' a rejoint l\'équipe ' . $this->team->name . ' dont vous faites partie')
            ->line('Date et heure de l\'ajout : ' . now());
    }
}
