<?php

namespace Database\Seeders;

use App\Models\RealtyType;
use Illuminate\Database\Seeder;

class RealtyTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            [
                'name' => 'Оффис',
                'img_path' => '/storage/image/town.png'
            ],
            [
                'name' => 'Склад',
                'img_path' => '/storage/image/image.jpg'
            ],
            [
                'name' => 'Земля',
                'img_path' => '/storage/image/town3.png'
            ],
            [
                'name' => 'Ангар',
                'img_path' => '/storage/image/town1.png'
            ],
            [
                'name' => 'Офисные блоки',
                'img_path' => '/storage/image/town2.png'
            ]
        ];

        RealtyType::insert($types);
    }
}
