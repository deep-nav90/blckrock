<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    protected $checkLogin, $getOrderDetails;
    public function __construct($checkLogin, $getOrderDetails)
    {
        $this->loginDetails = $checkLogin;
        $this->orderDetails = $getOrderDetails;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(env('MAIL_USERNAME'),'Rock')
            ->subject('Order Details')
            ->view('website.emails.order-info')
            ->attach(storage_path('/app/public/pdf_files'.'/'. $this->orderDetails->pdf_file_name))
            ->with([
                'loginDetails' => $this->loginDetails, 
                'orderDetails' => $this->orderDetails,
                'logo' => public_path('logo/logo.png')
            ]);    
    }
}
