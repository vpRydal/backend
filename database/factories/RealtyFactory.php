<?php

namespace Database\Factories;

use App\Models\Realty;
use Illuminate\Database\Eloquent\Factories\Factory;

class RealtyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Realty::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $date = $this->faker->dateTimeBetween('-5years');

        return [
            'description' => $this->faker->unique()->realText(700),
            'name' => $this->faker->unique()->realText(50),
            'renovation' => (bool) mt_rand(0,1),
            'heating' => (bool) mt_rand(0,1),
            'area' => $this->faker->randomFloat(2, 200, 10000),
            'price' => $this->faker->randomFloat(2, 100, 10000),
            'restroom' => (bool) mt_rand(0,1),
            'access' => (bool) mt_rand(0,1),
            'furniture' => (bool) mt_rand(0,1),
            'energy' => (bool) mt_rand(0,1),
            'latitude' => mt_rand( 44450000, 44700000) / 1000000,
            'longitude' => mt_rand( 33450000, 33700000) / 1000000,
            'user_id' => 1,
            'img_path' => '/storage/image/image.jpg',
            'type_id' => random_int(1, 4),
            'photo'=> [
                '/storage/image/image.jpg',
                '/storage/image/image.jpg'
            ],
            'created_at' => $date,
            'updated_at' => $date
        ];
    }
}
