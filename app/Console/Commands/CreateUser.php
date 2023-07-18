<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Hash;

class CreateUser extends Command
{
    protected $signature = 'user:create {--dev : Create a developer user}';

    protected $description = 'Manually creates a user.';

    public function handle()
    {
        if ($this->option('dev') && !App::environment('local')) {
            $this->error('The --dev option can only be used in the local environment.');

            return;
        }

        if ($this->option('dev')) {
            $firstName = 'dev';
            $lastName = 'dev';
            $email = 'dev@dev.io';
            $password = 'dev';
        } else {
            $firstName = $this->ask('Please enter a first name.');
            $lastName = $this->ask('Please enter a last name.');
            $email = $this->ask('Please enter an email.');
            $password = $this->secret('Please enter a password.');
        }

        try {
            User::create([
                'first_name' => $firstName,
                'last_name' => $lastName,
                'email' => $email,
                'password' => Hash::make($password),
            ]);
            $this->info('User created successfully!');
        } catch (\Exception $e) {
            $this->error($e->getMessage());

            return;
        }
    }
}
