<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin 1',
            'email' => 'admin1@mail.com',
            'login_id' => 'admin1',
            'password' => bcrypt('secret'),
            'role' => 'admin',
        ]);
    }
}
