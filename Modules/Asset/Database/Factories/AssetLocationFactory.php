<?php

namespace Modules\Asset\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Asset\Entities\AssetLocation;

class AssetLocationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = AssetLocation::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->city,
        ];
    }
}
