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
        $price_per_metr = $this->faker->randomFloat(2, 100, 1000);
        $area = $this->faker->randomFloat(2, 100, 1000);
        return [
            'description' => $this->faker->unique()->realText(700),
            'name' => $this->faker->unique()->realText(50),
            'area' => $area,
            'price' => $price_per_metr * $area,
            'price_per_metr' => $price_per_metr,
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
