<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@appointment.com',
            'password' => bcrypt('admin123'),
            'mobile' => '9800000000',
            'address' => 'Kathmandu, Nepal',
            'role' => 1,
        ]);
    }
}
