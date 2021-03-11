<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Ingredient;
use App\Models\Recipe;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Seeder;

class TestingDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // users and authors and tags and ingredients
        // recipes

        $authors = Author::factory(50)->create();
        $ingredients = Ingredient::factory(50)->create();
        $tags = Tag::factory(50)->create();
        $users = User::factory(50)->create();
        $recipes = new Collection();

        for ($i = 0; $i < 200; ++$i) {
            $recipe = Recipe::factory()->create([
                'user_id' => $users->random()->id,
                'author_id' => $authors->random()->id,
            ]);
            $usedIngredients = [];
            $usedTags = [];
            for ($j = 0; $j < 50; ++$j) {
                if (rand(0, 1)) {
                    $ingredient = $ingredients->random()->id;
                    if (!in_array($ingredient, $usedIngredients)) {
                        array_push($usedIngredients, $ingredient);
                        $recipe->ingredients()->attach(
                            $ingredient,
                            ['amount' => rand(0, pow(2, 16) - 1)]
                        );
                    }
                }
                if (rand(0, 1)) {
                    $tag = $tags->random()->id;
                    if (!in_array($tag, $usedTags)) {
                        array_push($usedTags, $tag);
                        $recipe->tags()->attach($tag);
                    }
                }
            }
            $recipe->save();
            $recipes->add($recipe);
        }
    }
}
