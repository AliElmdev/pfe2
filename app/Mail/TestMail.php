<?php

namespace App\Mail;

use App\Models\Entreprise;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use PhpParser\Node\Expr\Cast\Array_;

class TestMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $entreprise_request = [];
    public $user_request = [];
    public function __construct(Entreprise $entreprise,User $user)
    {
        $this->entreprise_request = $entreprise;
        $this->user_request = $user;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.Registrations_request');
    }
}
