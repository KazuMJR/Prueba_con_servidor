<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Grado;

class GradoFactory extends Factory
{
    protected $model = Grado::class;

    public function definition(): array
    {
        $niveles = [
            'Primaria',
            'Secundaria',
            'Preparatoria'
        ];

        return [
            'nombre_grado' => $this->faker->randomElement([
                'Primero', 'Segundo', 'Tercero', 'Cuarto', 'Quinto', 'Sexto',
                'Séptimo', 'Octavo', 'Noveno', 'Décimo', 'Undécimo', 'Duodécimo'
            ]),
            'nivel_educativo' => $this->faker->randomElement($niveles),
        ];
    }
}
