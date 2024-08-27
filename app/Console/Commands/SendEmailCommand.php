<?php

namespace App\Console\Commands;

use App\Mail\SendEmail;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendEmailCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    // الاسم هنا يمكنك تغييره 'app:send-email'
    protected $signature = 'app:send-email';
    
    /**
     * The console command description.
     *
     * @var string
     */
    // الايميل ده بيعمل ايه ويمكن تغييره 'Command description'
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
       Mail::to('rashasaber808@gmail.com')->send(new SendEmail);
    }
}
