<?php

namespace Database\Seeders;

use App\Models\Equipment;
use App\Models\RealtyType;
use Illuminate\Database\Seeder;

class EquipmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = RealtyType::all();

        $equipment = [
            [
                'name' => 'Индивидуальный узел учёта электроэнергии',
                'realty_type_id' => $types->random()->id
            ],
            [
                'name' => 'Мебелью укомплектован',
                'realty_type_id' => $types->random()->id
            ],
            [
                'name' => 'Отдельный санузел',
                'realty_type_id' => $types->random()->id
            ],
            [
                'name' => 'Отопление',
                'realty_type_id' => $types->random()->id
            ],
            [
                'name' => 'Круглосуточный доступ',
                'realty_type_id' => $types->random()->id
            ]
        ];
        Equipment::insert($equipment);
    }
}
