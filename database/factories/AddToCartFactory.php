<?php

namespace Database\Factories;

use App\Models\AddToCart;
use Illuminate\Database\Eloquent\Factories\Factory;

class AddToCartFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = AddToCart::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->randomDigitNotNull,
        'product_id' => $this->faker->randomDigitNotNull,
        'price' => $this->faker->word,
        'quantity' => $this->faker->word,
        'total' => $this->faker->word,
        'attributes' => $this->faker->text,
        'created_by' => $this->faker->randomDigitNotNull,
        'updated_by' => $this->faker->randomDigitNotNull,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
