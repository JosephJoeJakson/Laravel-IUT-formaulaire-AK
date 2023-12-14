<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Password;
use App\Models\Team;

class PasswordsNotification extends Notification
{
    use Queueable;

    protected $password;
    protected $team;

    public function __construct(Password $password, Team $team)
    {
        $this->password = $password;
        $this->team = $team;
    }

    public function via($notifiable)
    {
        return ['mail']; 
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->line('Le mot de passe du site : ' . $this->password->site . ' avec pour login : ' . $this->password->login . ' à été ajouté à la team '  . $this->team->name);
    }

    public function toArray($notifiable)
    {
        return [
            // You can define additional data to be sent in the notification array
        ];
    }
}
