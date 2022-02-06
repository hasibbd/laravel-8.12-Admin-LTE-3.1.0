<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin Name',
            'email' => 'admin@email.com',
            'password' => bcrypt('123456'),
            'role' => 1,
        ]);
    }
}
