<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderMail extends Mailable
{
    use Queueable, SerializesModels;
      public  $order;
      public  $detail;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($order,$detail)
    {
        $this->order=$order;  
        $this->detail=$detail;  
         }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Order Conformation')->view('mail.order_mail');
    }
}
