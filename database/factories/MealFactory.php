<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

class MealFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \App\Models\Meal::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $catID = $this->faker->numberBetween(0, 100);
        if ($catID == 0) {
            $catID = null;
        }
        $tagID = $this->faker->numberBetween(1, 200);
        $ingredientID = $this->faker->numberBetween(1, 200);
        return [
            'status' => 'created',
            'category_id' => $catID,
            'tag_id'=> $tagID,
            'ingredient_id'=> $ingredientID
        ];
    }
}
