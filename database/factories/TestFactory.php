<?php

namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;
class TestFactory extends Factory
{
    public function definition()
    {
        return [
            'text'=>$this->faker->sentence,
            'user_name'=>$this->faker->unique()->userName,
            'create_at'=>now(),
        ];
    }

}
