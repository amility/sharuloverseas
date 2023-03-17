<?php

namespace Database\Factories;

use App\Models\CustomerAddress;
use Illuminate\Database\Eloquent\Factories\Factory;

class CustomerAddressFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CustomerAddress::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'customer_id' => $this->faker->randomDigitNotNull,
        'first_name' => $this->faker->word,
        'last_name' => $this->faker->word,
        'company_name' => $this->faker->word,
        'country' => $this->faker->word,
        'street_address' => $this->faker->word,
        'appartment' => $this->faker->word,
        'town_city' => $this->faker->word,
        'state_country' => $this->faker->word,
        'postcode_zip' => $this->faker->word,
        'email_address' => $this->faker->word,
        'phone' => $this->faker->word,
        'is_primary' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
