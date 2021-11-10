<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Catalogue;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $user_cnt = User::count();
        $catalogue_cnt = Catalogue::count();
        return [
            'title' => $this->faker->sentence(),
            'catalogue_id' => random_int(1, $catalogue_cnt),
            'user_id' => random_int(1, $user_cnt),
            'published_at' => $this->faker->date(),
            'summary' => $this->faker->sentence(),
            'body' => $this->faker->paragraph()
        ];
    }
}
