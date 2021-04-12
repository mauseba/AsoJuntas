<?php

namespace Database\Factories;

use App\Models\Psuscripcion;
use App\Models\Junta;
use Illuminate\Database\Eloquent\Factories\Factory;

class PsuscripcionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Psuscripcion::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'FechaP' => $this->faker->date(),
            'Mes' => $this->faker->date(),
            'tipo' => $this->faker->randomElement(['suscripcion','bimestral']),
            'Comprobante' => $this->faker->url(),
            'Observaciones' => $this->faker->text(50),
            'junta_id' =>Junta::all()->random()->id
        ];
    }
}
