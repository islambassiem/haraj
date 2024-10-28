<?php

namespace Database\Factories;

use App\Models\ItemCondition;
use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Item>
 */
class ItemFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition(): array
  {
    $post = collect(Post::all())->random();
    $condition = collect(ItemCondition::all())->random();
    return [
      'post_id' => $post->id,
      'item_condition_id' => $condition->id,
      'brand' => fake()->word()
    ];
  }
}
