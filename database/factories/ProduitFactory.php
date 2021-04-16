<?php

namespace Database\Factories;

use App\Models\Produit;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProduitFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Produit::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'designation' => $this->faker->unique()->realText($maxNbChars = 200, $indexSize = 2),
            'description' => $this->faker->text($maxNbChars = 200),
            'prix' => $this->faker->numberBetween($min = 500, $max = 1000000)
        ];
    }
}
