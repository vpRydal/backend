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
        $photos = [
            '/storage/image/image.jpg',
            '/storage/image/town.png',
            '/storage/image/town1.png',
            '/storage/image/town2.png',
            '/storage/image/town3.png',
            '/storage/image/town4.png',
        ];
        $slide1=new Slide();
        $slide1->header="что-то у слайдера";
        $slide1->content="что-то у слайдера это основной контент";
        $slide1->image="/storage/image/town1.png";
        $slide1->user_id=1;
        $slide1->ref='#';
        $slide1->save();

        $slide2=new Slide();
        $slide2->header="что-то у слайдера";
        $slide2->content="что-то у слайдера это основной контент";
        $slide2->image="/storage/image/town2.png";
        $slide2->user_id=1;
        $slide2->ref='#';
        $slide2->save();
    }
}
