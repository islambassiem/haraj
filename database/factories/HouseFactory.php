<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\House>
 */
class HouseFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition(): array
  {
    $post = collect(Post::all())->random();
    return [
      'post_id' => $post->id,
      'bedrooms' => fake()->numberBetween(1, 5),
      'bathrooms' => fake()->numberBetween(1, 3),
      'living_rooms' => fake()->numberBetween(1, 3) ,
      'floor' => fake()->numberBetween(0, 100),
      'heating_system' => fake()->boolean(),
      'air_conditioner' => fake()->boolean(),
      'parking' => fake()->boolean(),
    ];
  }
}
