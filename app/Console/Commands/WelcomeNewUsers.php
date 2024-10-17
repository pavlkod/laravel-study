<?php

// php artisan make:command WelcomeNewUsers --command=email:newusers

namespace App\Console\Commands;

use Illuminate\Console\Command;

class WelcomeNewUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:newusers {test?} {--test}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    // inject UserMailer
    /*     public function __construct(UserMailer $userMailer)
        {
            parent::__construct();
            $this->userMailer = $userMailer;
        } */

    /**
     * Execute the console command.
     */
    public function handle()
    {
        echo 234;
        print_r($this->arguments());
        print_r($this->options());
        // $this->userMailer->welcomeNewUsers();
    }
}
