<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ForgotPassword extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    private $name;
    private $slug;

    public function __construct($user, $slug)
    {
        $this->slug = $slug;
        $this->name = $user->first_name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.forgot-password')->with([
            'slug' => $this->slug,
            'name' => $this->name,
            'site_url' => env('APP_URL')
        ]);
    }
}
