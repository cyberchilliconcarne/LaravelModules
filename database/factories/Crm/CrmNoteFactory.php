<?php

namespace Database\Factories\Crm;

use App\Models\Crm\CrmNote;
use Illuminate\Database\Eloquent\Factories\Factory;

class CrmNoteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CrmNote::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'note' => $this->faker->text,
        ];
    }
}
