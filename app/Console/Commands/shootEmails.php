<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Mail;
use App\Mail\DemoEmail;
use Carbon\Carbon;
use App\Jobs\SendEmail;
use DB;

class shootEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'shoot:emails';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'send emails to users';

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
     * @return mixed
     */
    public function handle()
    {
        //
        $job = (new SendEmail())->delay(Carbon::now()->addSeconds(10));
        dispatch($job);
            
    }
}
