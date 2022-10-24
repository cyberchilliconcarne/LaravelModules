<?php

namespace Database\Factories\Faq;

use App\Models\Faq\FaqCategory;
use App\Models\Faq\FaqQuestion;
use Illuminate\Database\Eloquent\Factories\Factory;

class FaqQuestionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = FaqQuestion::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'question' => $this->faker->text . '?',
            'answer' => $this->faker->text,
            'category_id' => FaqCategory::all()->random()->id ?? FaqCategory::factory()->create()->id,
        ];
    }
}
