<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Sell;
use Carbon\Carbon;
class changesale extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'change:sale';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'this Command will chnage the status of those sale where date is ended';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
         $now=Carbon::now();
        $user=Sell::where('end_time','<',$now)->delete();
    }
}
