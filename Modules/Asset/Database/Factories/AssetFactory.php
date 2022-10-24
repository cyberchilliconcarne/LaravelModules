<?php

namespace Modules\Asset\Database\Factories;

use Modules\Asset\Entities\Asset;
use Modules\Asset\Entities\AssetCategory;
use Modules\Asset\Entities\AssetLocation;
use Modules\Asset\Entities\AssetStatus;
use Illuminate\Database\Eloquent\Factories\Factory;

class AssetFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Asset::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'serial_number' => rand(1111111, 9999999),
            'name' => $this->faker->word,
            'notes' => $this->faker->sentence,
            'status_id' => AssetStatus::all()->random()->id,
            'category_id' => AssetCategory::all()->random()->id ?? AssetCategory::factory()->create()->id,
            'location_id' => AssetLocation::all()->random()->id ?? AssetLocation::factory()->create()->id,

        ];
    }
}
