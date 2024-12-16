<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = new User;
        $user->username = "admin";
        $user->role = "admin";
        $user->address = "Lahore";
        $user->email = "admin@example.com";
        $user->password = bcrypt("admin123");
        $user->save();
    }
}
