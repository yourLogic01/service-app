<?php

namespace Database\Seeders;

use App\Models\Item;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Item::create([
            'name' => 'Kulkas',
        ]);
        Item::create([
            'name' => 'TV',
        ]);
        Item::create([
            'name' => 'Mesin Jahit',
        ]);
        Item::create([
            'name' => 'mesin Cuci',
        ]);
        Item::create([
            'name' => 'Rice Cooker',
        ]);
        Item::create([
            'name' => 'Blender',
        ]);
        Item::create([
            'name' => 'Jet Pump',
        ]);
        Item::create([
            'name' => 'Dispenser',
        ]);
    }
}
