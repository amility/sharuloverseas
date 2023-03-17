<?php

namespace Database\Factories;

use App\Models\Products;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Products::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'category_id' => $this->faker->word,
        'brand_id' => $this->faker->word,
        'prod_sku' => $this->faker->word,
        'prod_name' => $this->faker->word,
        'prod_slug' => $this->faker->word,
        'prod_price' => $this->faker->word,
        'total_stock' => $this->faker->word,
        'prod_description' => $this->faker->word,
        'prod_details' => $this->faker->word,
        'prod_specification' => $this->faker->word,
        'prod_video_url' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
