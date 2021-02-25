<?php

namespace Database\Factories;

use App\Models\Juntas;
use Illuminate\Database\Eloquent\Factories\Factory;

class JuntasFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Juntas::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [ 
            'FechaC' => $this->faker->dateTime(),
            'Vereda' => $this->faker->state(),
            'NIT' => $this->faker->ipv4(),
            'D_recibo de pago'=> $this->faker->url(),
            'D_NIT'=> $this->faker->url(),
            'D_Resolucion'=> $this->faker->url(),
            'status'=> $this->faker->randomElement([1,2]),
            'Observaciones'=> $this->faker->text(100)
        ];
    }
}
