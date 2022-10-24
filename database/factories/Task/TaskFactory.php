<?php

namespace Database\Factories\Task;

use App\Models\Task\Task;
use App\Models\Task\TaskStatus;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Task::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->sentence,
            'description' => $this->faker->text,
            'due_date' => Carbon::now()->addDays(rand(-10, 90))->format(config('panel.date_format')),
            'status_id' => TaskStatus::all()->random()->id ?? TaskStatus::factory()->create(['name' => 'Open'])->id
        ];
    }
}
