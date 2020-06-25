<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use DB;
use Mail;
use App\Mail\DemoEmail;
class SendEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
 
    public function __construct()
    {
        //   
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $data = DB::table('users')->pluck('email');
        foreach($data as $d){
            Mail::to($d)->send(new DemoEmail());
        }
    }
}
