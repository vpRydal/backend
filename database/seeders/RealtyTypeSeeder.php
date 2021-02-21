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
        $realtyType=new RealtyType();
        $realtyType->id=1;
        $realtyType->name='Оффис';
        $realtyType->save();

        $realtyType1=new RealtyType();
        $realtyType1->id=2;
        $realtyType1->name='Склад';
        $realtyType1->save();

        $realtyType2=new RealtyType();
        $realtyType2->id=3;
        $realtyType2->name='Земля';
        $realtyType2->save();

        $realtyType3=new RealtyType();
        $realtyType3->id=4;
        $realtyType3->name='Ангар';
        $realtyType3->save();
    }
}
