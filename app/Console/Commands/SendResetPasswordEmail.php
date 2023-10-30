<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Mail\ResetPasswordMail;

class SendResetPasswordEmail extends Command
{
    // /**
    //  * The name and signature of the console command.
    //  *
    //  * @var string
    //  */
    // protected $signature = 'command:name';

    // /**
    //  * The console command description.
    //  *
    //  * @var string
    //  */
    // protected $description = 'Command description';

    // /**
    //  * Execute the console command.
    //  *
    //  * @return int
    //  */
    protected $signature = 'send:resetpasswordemail {email}';
    protected $description = 'Send a reset password email to the specified email address.';

    public function __construct()
    {
        parent::__construct();
    }
    public function handle()
    {
        $email = $this->argument('email');
        $token = 'generate_a_unique_token_here'; // Tạo một token duy nhất cho liên kết reset password

        // Gửi email sử dụng Mail facade
        Mail::to($email)->send(new ResetPasswordMail($token));

        $this->info('Reset password email sent successfully.');
    }
}
