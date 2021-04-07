<?php

namespace Database\Factories;

use App\Models\Junta;
use Illuminate\Database\Eloquent\Factories\Factory;

class JuntaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Junta::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [ 
            'FechaC' => $this->faker->date(),
            'NIT' => $this->faker->ipv4(),
            'Direccion' => $this->faker->streetAddress(),
            'Nombre' => $this->faker->state(),
            'Correo' => $this->faker->unique()->email,
            'D_Recibopago'=> $this->faker->url(),
            'D_NIT'=> $this->faker->url(),
            'D_Resolucion'=> $this->faker->url(),
            'status'=> $this->faker->randomElement([1,2]),
            'Observaciones'=> $this->faker->text(100)
        ];
    }
}
