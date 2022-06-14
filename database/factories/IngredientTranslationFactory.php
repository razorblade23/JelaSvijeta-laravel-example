<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class IngredientTranslationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \App\Models\IngredientTranslation::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $ingredientID = $this->faker->numberBetween(1, 200);
        return [
            'ingredient_id' => $ingredientID,
            'title'=> $this->faker->word(),
        ];
    }
}
