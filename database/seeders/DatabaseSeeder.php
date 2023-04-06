<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $dev_user = new User();
        $dev_user->name = 'dev';
        $dev_user->email = 'dev@dev.io';
        $dev_user->password = Hash::make('dev');
        $dev_user->save();
    }
}
