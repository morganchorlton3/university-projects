<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Company;

class ConfirmCompany extends Notification
{
    use Queueable;

    public $company;
    public $user;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($company, $user)
    {
        $this->company = $company;
        $this->user = $user;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return explode(', ', $notifiable->notificationPref);
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->markdown('email.company.AlertAdmin', [
                        'company' => $this->company,
                        'user' => $this->user,
                        ]);
    }

    public function toDatabase($notifiable)
    {
        return [
            'companyRequestID' => $this->company->id,
        ];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
