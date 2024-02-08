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
            // 'team_id' => $this->team->id,
            // 'user_id' => $this->user->id,
            // 'added_by_user_id' => $this->addedByUser->id,
            // 'added_at' => now(),
        ];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->line( $this->user->name . __('notification.add') . $this->team->name . __('notification.by') . $this->addedByUser->name . __('notification.when') . now() );
    }
}
