<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Asyifa Maulana',
            'username' => 'asyifamaulana',
            'email' => 'asyifamaulana@gmail.com',
            'password' => bcrypt('123'),
            'role_id' => 1,
            'phone' => '081234567890',
        ]);
        User::create([
            'name' => 'anes',
            'username' => 'anesbaswedan',
            'email' => 'anesbaswedan@gmail.com',
            'password' => bcrypt('123'),
            'role_id' => 2,
            'phone' => '081235622333',
        ]);
    }
}
