<?php

namespace Database\Seeders;

use App\Models\News;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $first = new News();
        $first->photo = [
            '/storage/image/image.jpg',
            '/storage/image/image.jpg'
        ];
        $first->header = 'Сдесь находиться краткое описание';
        $first->content = 'Сдесь находиться полное описание, Сдесь находиться полное описание,Сдесь находиться полное описание';
        $first->user_id = 1;
        $first->save();

        $second = new News();
        $second->photo = [
            '/storage/image/image.jpg',
            '/storage/image/image.jpg'
        ];
        $second->header = 'Сдесь находиться краткое описание';
        $second->content = 'Сдесь находиться полное описание, Сдесь находиться полное описание,Сдесь находиться полное описание';
        $second->user_id = 1;
        $second->save();

        $third = new News();
        $third->photo = [
            '/storage/image/image.jpg',
            '/storage/image/image.jpg'
        ];
        $third->header = 'Сдесь находиться краткое описание';
        $third->content = 'Сдесь находиться полное описание, Сдесь находиться полное описание,Сдесь находиться полное описание';
        $third->user_id = 1;
        $third->save();
    }
}
