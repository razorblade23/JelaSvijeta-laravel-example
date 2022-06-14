<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TagTranslationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \App\Models\TagTranslation::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $tagID = $this->faker->numberBetween(1, 200);
        return [
            'tag_id' => $tagID,
            'title'=> $this->faker->word(),
        ];
    }
}
