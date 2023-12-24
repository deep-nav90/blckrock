<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactUs extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $data;
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(env('MAIL_USERNAME'),'Rock')
            ->subject('Contact Us')
            ->view('website.emails.contact-us')
            ->with([
                'data' => $this->data,
                'logo' => public_path('logo/logo.png'),
                'facebook' => public_path('assets/images/facebook-logo-black.png'),
                'youtube' => public_path('assets/images/youtube-logo-black.png'),
                'instagram' => public_path('assets/images/instagram-logo-black.png'),
                'thankyou' => public_path('assets/images/thankyoupurchase.png')
            ]);
    }
}
