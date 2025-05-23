<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Catedratico;

class CatedraticoFactory extends Factory
{
    protected $model = Catedratico::class;

    public function definition(): array
    {
        return [
            'cui' => $this->faker->unique()->numerify('###############'), // 15 dígitos
            'nombre_catedratico' => $this->faker->name,
            'edad' => $this->faker->numberBetween(25, 60),
            'sexo' => $this->faker->randomElement(['M', 'F']),
        ];
    }
}
