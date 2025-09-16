<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Netizen>
 */
class NetizenFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = \Faker\Factory::create('ms_MY'); //localize for Malaysia

        $races = ['Melayu', 'Cina', 'India', 'Lain-lain'];

        return [
            'name'=>$faker->name,
            'ic_number'=>$faker->myKadNumber, // Malaysian IC number
            'race'=>$faker->randomElement($races),
            'address'=>$faker->address,
        ];
    }
}
