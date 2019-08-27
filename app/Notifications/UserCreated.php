<?php

namespace App\Notifications;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Auth;

class UserCreated extends Notification
{
    use Queueable;

    protected $creator;
    protected $created;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(User $creator,User $created)
    {
        $this->creator = $creator;
        $this->created = $created;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->line('The introduction to the notification.')
            ->action('Notification Action', url('/'))
            ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'creator' => $this->creator->id,
            'message' => $this->created->name .' user with role '. $this->created->getRoleNames()->first().' created By ' .$this->creator->name
        ];
    }
}
