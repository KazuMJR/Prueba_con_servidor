<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\CalendarioExamenes;

class CalendarioExamenesFactory extends Factory
{
    protected $model = CalendarioExamenes::class;

    public function definition(): array
    {
        return [
            'fecha' => $this->faker->dateTimeBetween('-1 month', '+2 months')->format('Y-m-d'),
            'descripcion' => $this->faker->sentence(8),
        ];
    }
}
