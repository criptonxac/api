<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserAddress>
 */
class UserAddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [

            'user_id'   =>fake()->numerify(50),
            'latitude'  =>fake()->text(),
            'longitude' =>fake()->text(),
            'region'    =>fake()->text(),
            'district'  =>fake()->text(),
            'street'    =>fake()->text(),
            'home'      =>fake()->text(),
        ];
    }
}
