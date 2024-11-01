<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Vehicle;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   */
  public function run(): void
  {
    User::factory(10)->create();

    User::factory()->create([
      'name' => 'Test User',
      'email' => 'test@example.com',
    ]);

    $this->call([
      CategorySeeder::class,
      PostSeeder::class,
      ItemConditionSeeder::class,
      ItemSeeder::class,
      VehicleSeeder::class,
      HouseSeeder::class,
    ]);
  }
}
