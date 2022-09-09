<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\SiteContato;
use Faker\Generator as Faker;



/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SiteContato>
 */
class SiteContatoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     * 
     */
    public function definition()
    {
        return [
            'nome' => fake()->name(),
            'telefone' => fake()->phoneNumber(),
            'email' => fake()->unique()->email(),
            'motivo_contato' => fake()->numberBetween(1, 3),
            'mensagem' => fake()->text(200)
        ];
    }
}
