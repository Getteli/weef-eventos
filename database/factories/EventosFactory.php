<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class EventosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user = User::inRandomOrder()->first(['id'])->id;

        $estados = [
            0 => "AC",
            1 => "AL",
            2 => "AP",
            3 => "AM",
            4 => "BA",
            5 => "CE",
            6 => "DF",
            7 => "ES",
            8 => "GO",
            9 => "MA",
            10 => "MT",
            11 => "MS",
            12 => "MG",
            13 => "PA",
            14 => "PB",
            15 => "PR",
            16 => "PE",
            17 => "PI",
            18 => "RJ",
            19 => "RN",
            20 => "RS",
            21 => "RO",
            22 => "RR",
            23 => "SC",
            24 => "SP",
            25 => "SE",
            26 => "TO"
        ];

        return [
			'user_id'     => $user,
			'nome'        => $this->faker->name,
			'cep'         => $this->faker->postcode,
			'endereco'    => $this->faker->streetName,
			'numero'      => $this->faker->buildingNumber,
            'date_evento' => $this->faker->dateTime,
            'estado'      => $estados[mt_rand(0,26)],
            'cidade'      => $this->faker->streetName,
            'complemento' => $this->faker->streetName,
            'telefone'    => $this->faker->phoneNumber,
            'created_at' => now(),
            'updated_at' => now()
        ];
    }
}