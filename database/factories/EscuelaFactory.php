<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Escuela;

class EscuelaFactory extends Factory
{
    protected $model = Escuela::class;

    public function definition(): array
    {
        return [
            'nombre_escuela' => $this->faker->company . ' School',
            'direccion' => $this->faker->streetAddress,
            'codigo_establecimiento' => $this->faker->unique()->numerify('######'),
            'zona' => str_pad((string)$this->faker->numberBetween(1, 25), 2, '0', STR_PAD_LEFT),
        ];
    }
}
