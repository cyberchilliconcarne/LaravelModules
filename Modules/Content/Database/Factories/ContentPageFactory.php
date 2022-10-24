<?php

namespace Modules\Content\Database\Factories;

use Modules\Content\Entities\ContentPage;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContentPageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ContentPage::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'page_text' => collect($this->faker->paragraphs(5))->join(' '),
            'excerpt' => $this->faker->paragraph,
        ];
    }
}
