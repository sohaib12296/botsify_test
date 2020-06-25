<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
// use App\Jobs\SendEmail;
// use DB;

class EmailController extends Controller
{
    //

    public function sendEmail(){
        
        
        return "testing";
        // $job = (new SendEmail())->delay(Carbon::now()->addSeconds(10));
        //     dispatch($job);

        // return "email send";
    }
}
