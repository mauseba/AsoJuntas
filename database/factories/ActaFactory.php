<?php

namespace Database\Factories;

use App\Models\Acta;
use App\Models\Evento;
use Illuminate\Database\Eloquent\Factories\Factory;

class ActaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Acta::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'url'=>$this->faker->url(),
            'evento_id'=>Evento::all()->random()->id
        ];
    }
}
