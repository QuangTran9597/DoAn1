<?php

namespace App\Console\Commands;

use App\Mail\VerifyEmail;

use App\Notifications\VerifyEmail as NotificationsVerifyEmail;
use Illuminate\Console\Command;
use stdClass;
use Illuminate\Support\Facades\Mail;
use App\Models\User;

class SendMails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mail:send {email} {--mailable}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This is a description';

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

        $email = $this->argument('email');

         $mailable = $this->option('mailable');
         
         if( $mailable) {
            $data = new \stdClass();
            $data->name = 'Donal Trump';
            Mail::to($email)->send(new VerifyEmail($data));
         } else {
             $user = User::query()->where('email', $email)->first();
             $user->notify(new \App\Notifications\VerifyEmail());
         }
    }
}
