<?php

namespace Database\Factories;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class TicketFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'topic_id' =>  $this->faker->numberBetween(1, 3),
            'email' =>  $this->faker->email(),
            'text' =>  $this->faker->text(400),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}