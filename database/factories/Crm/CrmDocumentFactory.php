<?php

namespace Database\Factories\Crm;

use App\Models\Crm\CrmDocument;
use Illuminate\Database\Eloquent\Factories\Factory;

class CrmDocumentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CrmDocument::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'description' => $this->faker->paragraph,
        ];
    }
}
