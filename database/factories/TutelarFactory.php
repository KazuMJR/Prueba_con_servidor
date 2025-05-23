<?php

namespace Database\Factories;

use App\Models\Tutelar;
use App\Models\Alumno;
use Illuminate\Database\Eloquent\Factories\Factory;

class TutelarFactory extends Factory
{
    protected $model = Tutelar::class;

    public function definition(): array
    {
        return [
            'cui_alumno'   => Alumno::inRandomOrder()->first()->cui ?? Alumno::factory(),
            'cui_tutor'    => $this->faker->unique()->numerify('###########'), // CUI simulado
            'nombre_tutor' => $this->faker->name,
            'telefono' => $this->faker->optional()->numerify($this->faker->randomElement(['3#######', '4#######', '5#######', '6#######', '7#######'])),
        ];
    }
}
