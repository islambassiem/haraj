<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vehicle>
 */
class VehicleFactory extends Factory
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
      'year' => fake()->numberBetween(1995, date('Y') + 1),
      'make' => fake()->word(),
      'model' => fake()->word(),
    ];
  }
}
