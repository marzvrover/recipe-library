<?php

namespace Database\Factories;

use App\Models\Recipe;
use Illuminate\Database\Eloquent\Factories\Factory;

class RecipeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Recipe::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => function () {
                return \App\Models\User::factory()->create()->id;
            },
            'author_id' => function () {
                return \App\Models\Author::factory()->create()->id;
            },
            'name' => $this->faker->title,
            'description' => $this->faker->text,
            'instructions' => $this->faker->text,
            'source_url' => $this->faker->url,
        ];
    }
}
