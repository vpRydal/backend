<?php

namespace Database\Seeders;

use App\Models\Realty;
use Faker\Generator;
use Illuminate\Database\Seeder;

class RealtySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Realty::factory(100)->create();
    }
}
