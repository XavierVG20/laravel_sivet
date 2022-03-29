<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ClientesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombres' => $this->faker->name(),
            'num_id' => $this->faker->randomNumber(9),
            'direccion' => $this->faker->address(),
            'telefono' => $this->faker->PhoneNumber(),
            'email' => $this->faker->safeEmail(),
        ];
    }
}
