<?php

namespace Modules\Content\Database\Factories;

use Modules\Content\Entities\ContentTag;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ContentTagFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ContentTag::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $tag = collect($this->faker->words(rand(1, 4)))->join(' ');

        return [
            'name' => $tag,
            'slug' => Str::slug($tag),
        ];
    }
}
