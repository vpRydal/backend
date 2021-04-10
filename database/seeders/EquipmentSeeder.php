<?php

namespace Database\Seeders;

use App\Models\Equipment;
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
        $equipment = [
            [
                'name' => 'energy',
                'display_name' => 'Индивидуальный узел учёта электроэнергии'
            ],
            [
                'name' => 'furniture',
                'display_name' => 'Мебелью укомплектован'
            ],
            [
                'name' => 'restroom',
                'display_name' => 'Отдельный санузел'
            ],
            [
                'name' => 'heating',
                'display_name' => 'Отопление'
            ],
            [
                'name' => 'access',
                'display_name' => 'Круглосуточный доступ'
            ]
        ];
        Equipment::insert($equipment);
    }
}
