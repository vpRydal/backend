<?php

namespace Database\Seeders;

use App\Models\Slide;
use Illuminate\Database\Seeder;

class SlidesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $slides = [
            [
                'header' => "что-то у слайдера",
                'content' => "что-то у слайдера это основной контент",
                'image' => "/storage/image/town1.png",
                'user_id' => 1
            ],
            [
                'header' => "что-то у слайдера",
                'content' => "что-то у слайдера это основной контент",
                'image' => "/storage/image/town2.png",
                'user_id' => 1
            ]
        ];

        Slide::insert($slides);
    }
}
