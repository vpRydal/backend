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
                'img_path' => '/storage/image/image.jpg'
            ],
            [
                'name' => 'Склад',
                'img_path' => '/storage/image/image.jpg'
            ],
            [
                'name' => 'Земля',
                'img_path' => '/storage/image/image.jpg'
            ],
            [
                'name' => 'Ангар',
                'img_path' => '/storage/image/image.jpg'
            ],
            [
                'name' => 'Офисные блоки',
                'img_path' => '/storage/image/image.jpg'
            ]
        ];

        RealtyType::insert($types);
    }
}
