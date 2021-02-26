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
            'Num_contacto'=> $this->faker->phoneNumber(),
            'Niv_educacion'=> $this->faker->word(20),
            'Correo'=> $this->faker->unique()->email,
            'Cargo'=> $this->faker->jobTitle,
            'junta_id'=> Junta::all()->random()->id
        ];
    }
}
