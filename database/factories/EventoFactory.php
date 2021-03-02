<?php

namespace Database\Factories;

use App\Models\Evento;
use DateTime;
use Illuminate\Database\Eloquent\Factories\Factory;

class EventoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Evento::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'Fecha'=>$this->faker->dateTime(),
            'Asunto'=>$this->faker->text(50),
            'hora_inicio'=>$this->faker->time($format = 'H:i:s', $max = 'now'),
            'hora_final'=>$this->faker->time($format = 'H:i:s', $max = 'now'),
            'Descripcion'=>$this->faker->text(100)

        ];
    }
}
