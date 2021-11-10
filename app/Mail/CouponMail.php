<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CouponMail extends Mailable
{
    use Queueable, SerializesModels;
    protected $coupon;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($coupon)
    {
        $this->coupon=$coupon;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.coupon')->with('coupon',$this->coupon);
    }
}
