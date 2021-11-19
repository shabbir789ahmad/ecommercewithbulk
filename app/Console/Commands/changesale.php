<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Sell;
use App\Models\Deal;
use App\Models\Stock2;
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
        $users=Sell::where('end_time','<',$now)->delete();
        $deals=Deal::where('deal_end_date','<',$now)->get();
        foreach ($deals as  $deal) {
           $val=array('discount' => null,'deal'=> null);
           $stock=Stock2::where('id',$deal['deal_id'])->update($val);
           $deals2=$deal->delete();
        }
        
         
    }
}
