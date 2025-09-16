<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Inventory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Inventory>
 */
class InventoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Inventory::class;
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'qty' => $this->faker->numberBetween(1,10),
            'description' => $this->faker->sentence(),
        ];
    }
}
