<?php

namespace Database\Factories;

use App\Models\Junta;
use App\Models\UserJun;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserJunFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = UserJun::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->name(),
            'Tip_identificacion' => $this->faker->word(20),
            'Num_identificacion' => $this->faker->ipv4(),
            'Direccion' => $this->faker->streetAddress(),
            'Genero' => $this->faker->randomElement(['M','F','O']),
            'estrato' => $this->faker->randomElement([1,2,3,4,5]),
            'Edad' => $this->faker->numberBetween($min = 0, $max = 90),
            'Num_contacto'=> $this->faker->phoneNumber(),
            'Niv_educacion'=> $this->faker->word(20),
            'Correo'=> $this->faker->unique()->email,
            'Cargo'=> $this->faker->randomElement(['asociado','presidente','secretario']),
            'junta_id'=> Junta::all()->random()->id
        ];
    }
}
