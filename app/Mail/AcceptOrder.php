<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AcceptOrder extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $find_order;
    public function __construct($find_order)
    {
        $this->find_order = $find_order;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(env('MAIL_USERNAME'),'Rock')
            ->subject('Order Accepted')
            ->view('admin.emails.accept-order')
            ->with([
                'find_order' => $this->find_order,
                'logo' => public_path('logo/logo.png')
            ]);    
    }
}
