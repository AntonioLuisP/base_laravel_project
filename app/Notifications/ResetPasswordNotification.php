<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Lang;

class ResetPasswordNotification extends Notification
{
    use Queueable;

    public $token;

    public function __construct($token)
    {
        $this->token = $token;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
                ->subject('Notificação de Recriação de senha')
                ->greeting('Olá!')
                ->line('Você está recebendo este email por que recebemos uma solicitação de recriação de senha')
                ->action('Recriar senha', route('password.reset', $this->token))
                ->line('Este link de recriação de senha irá expirar em :count minutos', ['count' => config('auth.passwords.'.config('auth.defaults.passwords').'.expire')])
                ->line('Se você não solicitou a recriação de senha ignore este email')
                ->salutation(config('app.name'));
    }

    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
