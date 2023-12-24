<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ForgotPassword extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    private $token;
    public function __construct($token)
    {
        $this->token = $token;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(env('MAIL_USERNAME'),'Rock')
            ->subject('Reset Password')
            ->view('admin.emails.forgot-password')
            ->with(['token' => url("/admin/reset-password") . "/" .$this->token, 'logo' => public_path('logo/logo.png'), 'facebook' => public_path('assets/images/facebook-logo-black.png'),
            'youtube' => public_path('assets/images/youtube-logo-black.png'),
            'instagram' => public_path('assets/images/instagram-logo-black.png'),
            'thankyou' => public_path('assets/images/thankyoupurchase.png')]);
    }
}
