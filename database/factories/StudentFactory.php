<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "nis" => fake()->numerify(),
            "nama" => fake()->name(),
            "kelas_id"=>fake()->numberBetween(1, 4),
            "tanggal_lahir"=>fake()->dateTime(),
            "alamat" =>fake()->streetAddress()
        ];
    }



 /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'nis' => null,
        ]);
    }
}