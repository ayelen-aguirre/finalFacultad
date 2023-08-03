<?php

namespace App\Notifications;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class UsuarioNuevo extends Notification
{
    use Queueable;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)->markdown('mail.usuario.nuevo',
        [
            'user' => $this->user,
            'url' => route('home')
        ])->subject('Alta de Usuario');    
    }

    public function toArray($notifiable)
    {
        return [
            
        ];
    }
}
