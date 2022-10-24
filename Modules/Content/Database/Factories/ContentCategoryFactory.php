<?php

namespace Modules\Content\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Modules\Content\Entities\ContentCategory;

class ContentCategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ContentCategory::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $category = collect($this->faker->words(rand(1, 4)))->join(' ');

        return [
            'name' => $category,
            'slug' => Str::slug($category),
        ];
    }
}
