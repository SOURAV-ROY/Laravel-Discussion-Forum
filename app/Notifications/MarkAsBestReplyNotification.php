<?php

namespace LaravelForum\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use LaravelForum\Discussion;

class MarkAsBestReplyNotification extends Notification
{
    use Queueable;
    public $discussion;

    /**
     * Create a new notification instance.
     * //     * @param Discussion $discussion
     * @var Discussion
     */
    public function __construct(Discussion $discussion)
    {
        $this->discussion = $discussion;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param mixed $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->line('Your Reply Was Marked As Best Reply')
            ->action('View Discussion', route('discussions.show', $this->discussion->slug))
            ->line('Thank you for using DISCUSSION FORUM!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [

            'discussion' => $this->discussion
        ];
    }
}
