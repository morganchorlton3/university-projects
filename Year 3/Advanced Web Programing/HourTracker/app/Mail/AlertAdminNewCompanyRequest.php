<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Routing\Route;

class AlertAdminNewCompanyRequest extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($company, $user)
    {
        $this->user = $user;
        $this->company = $company;
        $this->url = Route('admin.company.index');
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('email.company.AlertAdmin')->with([
            'user' => $this->user,
            'company' => $this->company,
            'url' => $this->url,
        ]);
    }
}
