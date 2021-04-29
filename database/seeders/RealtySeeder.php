<?php

namespace Database\Seeders;

use App\Models\Equipment;
use App\Models\Realty;
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
        $equipments = Equipment::select('id')->get();

        Realty::factory(100)->create()->each(function (Realty $realty) use ($equipments) {
            $equipmentsToAttach = $equipments->reduce(function ($acc, $equipment) {
               if (random_int(0, 1)) {
                   $acc->push($equipment->id);
               }

               return $acc;
            }, collect([]));

            $realty->equipments()->attach($equipmentsToAttach);
        });
    }
}
