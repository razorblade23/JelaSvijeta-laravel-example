<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Ingredient::factory()->count(200)->create();
        \App\Models\Category::factory()->count(200)->create();
        \App\Models\Tag::factory()->count(200)->create();
        \App\Models\Meal::factory()->count(200)->create();
        \App\Models\IngredientTranslation::factory()->count(200)->create();
        \App\Models\CategoryTranslation::factory()->count(200)->create();
        \App\Models\TagTranslation::factory()->count(200)->create();
        \App\Models\MealTranslation::factory()->count(200)->create();

    }
}
