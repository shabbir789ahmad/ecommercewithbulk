<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

use App\Mail\SendOrderMail;
Use Mail;
class SendOrderEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected $user;
    protected $product;
    public function __construct($user,$product)
    {
        $this->user=$user;
        $this->product=$product;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        
        $mail=New SendOrderMail($this->user,$this->product);
        Mail::to($this->user['email'])->send($mail);

    }
}
