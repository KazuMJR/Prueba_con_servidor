<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\HorarioClase;

class HorarioClaseFactory extends Factory
{
    protected $model = HorarioClase::class;

    public function definition(): array
    {
        $horaInicio = $this->faker->time('H:i:s');
        $duracion = rand(1, 2); // Duración de 1 a 2 horas
        $horaFin = date('H:i:s', strtotime($horaInicio . " +{$duracion} hour"));

        return [
            'hora_inicio' => $horaInicio,
            'hora_fin' => $horaFin,
            'dia' => $this->faker->randomElement([
                'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes'
            ]),
            'aula' => 'Aula ' . $this->faker->numberBetween(1, 20),
        ];
    }
}
