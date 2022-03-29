<?php

namespace Database\Factories;
use App\Models\proveedores;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProveedoresFactory extends Factory
{

        /**
        * The name of the factory's corresponding model.
        *
        * @var string
        */
       protected $model = proveedores::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'empresa' => $this->faker->company(),
            'n_ruc' =>  $this->faker->randomNumber(9),
            'direccion'=> $this->faker->address(), //catchPhrase
            'telefono' => $this->faker->tollFreePhoneNumber(),
            'email' => $this->faker->companyEmail(),
            'n_contacto' => $this->faker->name(),
            't_contacto'=> $this->faker->PhoneNumber()

        ];
    }
}
