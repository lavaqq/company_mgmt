<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class CreateUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:create {--f|first_name= : First name} {--l|last_name= : Last name} {--e|email= : Email}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Manually creates an user.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $first_name = $this->option('first_name');
        if ($first_name === null) {
            $first_name = $this->ask('Please enter an first name.');
        }

        $last_name = $this->option('last_name');
        if ($last_name === null) {
            $last_name = $this->ask('Please enter an last name.');
        }

        $email = $this->option('email');
        if ($email === null) {
            $email = $this->ask('Please enter an email.');
        }

        $password = $this->secret('Please enter a password.');

        try {
            User::create([
                'first_name' => $first_name,
                'last_name' => $last_name,
                'email' => $email,
                'password' => Hash::make($password),
            ]);
        } catch (\Exception $e) {
            $this->error($e->getMessage());
            return;
        }
    }
}
