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
        for ($i = 0; $i < 100; $i++) {
            $realty = new Realty();
            $realty->description = "Офисное помещение площадью 9,7 м2 расположено на 1-м этаже 3-х-этажного офисного здания. Офис с евроремонтом, пол — линолеум, окна — стеклопакет. В офисе установлен кондиционер. Отдельный узел учёта электроэнергии. Возможно подключение интернета и IP-телефонии. Охраняемая территория, видеонаблюдение. ";
            $realty->name = "какое-то имя";
            $realty->renovation = (bool)mt_rand(0,1);
            $realty->heating = (bool)mt_rand(0,1);
            $realty->area = mt_rand(10,10000);
            $realty->renovation = (bool)mt_rand(0,1);
            $realty->price = mt_rand(100,10000000);
            $realty->restroom = (bool)mt_rand(0,1);
            $realty->access = (bool)mt_rand(0,1);
            $realty->furniture = (bool)mt_rand(0,1);
            $realty->energy = (bool)mt_rand(0,1);
            $realty->latitude = mt_rand( 44550000, 44600000)/1000000;
            $realty->longitude = mt_rand( 33450000, 33500000)/1000000;
            $realty->user_id = 1;
            $realty->type_id = ($i % 4) + 1;
            $realty->photo= json_encode([
                '/storage/image/image.jpg',
                '/storage/image/image.jpg'
            ]);
            $realty->save();
        }
    }
}
