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
    protected $signature = 'user:create';

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

        $first_name = $this->ask('Please enter an first name.');

        $last_name = $this->ask('Please enter an last name.');

        $email = $this->ask('Please enter an email.');

        $admin = $this->confirm('Should this user be admin? [y|n]', false);

        $password = $this->secret('Please enter a password.');

        try {
            $user = User::create([
                'first_name' => $first_name,
                'last_name' => $last_name,
                'email' => $email,
                'password' => Hash::make($password),
            ]);
            if ($admin) {
                $user->assignRole('admin');
            }
        } catch (\Exception $e) {
            $this->error($e->getMessage());
            return;
        }
    }
}
