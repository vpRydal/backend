<?php

namespace Database\Factories;

use App\Models\News;
use Illuminate\Database\Eloquent\Factories\Factory;

class NewsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = News::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'header' => $this->faker->unique()->realText(70),
            'content' => $this->faker->unique()->realText(),
            'user_id' => 1,
            'photo' => '/storage/image/image.jpg'
        ];
    }
}
