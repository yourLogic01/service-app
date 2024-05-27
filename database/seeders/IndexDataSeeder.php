<?php

namespace Database\Seeders;

use App\Models\IndexData;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IndexDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        IndexData::create([
            'phone' => '081775457350',
            'email' => 'asyifamaulana1412@gmail.com',
            'address' => 'Kp. Bojongsari Kidul, RT.01/RW.01, Balebandung Jaya, Pabuaran, Subang Regency, West Java 41262',
            'gmaps_url' => 'https://maps.app.goo.gl/oLtHCmSZhMEhhNM37',
        ]);
    }
}
