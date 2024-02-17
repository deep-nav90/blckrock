<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserForgotPassword extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    private $token, $find_user;
    public function __construct($token, $find_user)
    {
        $this->token = $token;
        $this->find_user = $find_user;
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
            ->view('website.emails.forgot-password')
            ->with([
            'token' => url("/user-reset-password") . "/" .$this->token,
            'user' => $this->find_user,
            'logo' => public_path('logo/logo.png'), 
            'facebook' => public_path('assets/images/facebook-logo-black.png'),
            'youtube' => public_path('assets/images/youtube-logo-black.png'),
            'instagram' => public_path('assets/images/instagram-logo-black.png'),
            'thankyou' => public_path('assets/images/thankyoupurchase.png')]);
    }
}
