<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\URL;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class PelangganCreatedNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    private $pelanggan;
    public function __construct($pelanggan)
    {
        $this->pelanggan = $pelanggan;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        // $url = URL::route('petugas.detail', ['id' => $this->pelanggan->id]);
        return [
            'message' => 'Pelanggan baru telah dibuat oleh admin.',
            'url' => route('petugas.detail', $this->pelanggan->id),
        ];
    }
}
