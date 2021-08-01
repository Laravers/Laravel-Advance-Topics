<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class Go extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'go';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Go route';

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
        $name = $this->anticipate('What is your name?', ['Taylor', 'Dayle']);
        $password = $this->secret('What is the password?');

        if($password == 'password') {
            $this->info('Welcome, '.$name.'!');
        }else {
            $this->error('password is not correct!');
        }

        if ($this->confirm('Do you wish to continue?', true)) {
            $this->info('yes');
        }
        $name = $this->choice(
            'What is your name?',
            ['Taylor', 'Dayle'],
            0,
            $maxAttempts = 2,
            $allowMultipleSelections = false
        );
        $this->info('The command was successful!');
        $this->newLine();
        $this->error('Something went wrong!');
        $this->newLine(2);
        $this->line('Display this on the screen');
        $this->newLine(2);
        $this->table(
            ['Name', 'Email'],
            User::take(10)->get(['name', 'email'])->toArray()
        );
    }
}
