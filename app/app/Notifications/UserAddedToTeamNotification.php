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
    protected $addedByUser;

    public function __construct($team, $user, $addedByUser)
    {
        $this->team = $team;
        $this->user = $user;
        $this->addedByUser = $addedByUser;
    }

    public function via(object $notifiable) {
        return ['mail', 'database'];
    }

    public function toArray(object $notifiable): array {
        return [
            'team_id' => $this->team->id,
            'user_id' => $this->user->id,
            'added_by_user_id' => $this->addedByUser->id,
            'added_at' => now(),
        ];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->line('L\'utilisateur ' . $this->user->name . ' a rejoint l\'équipe ' . $this->team->name . ' dont vous faites partie')
            ->line('Ajout effectué par : ' . $this->addedByUser->name)
            ->line('Date et heure de l\'ajout : ' . now());
    }
}
