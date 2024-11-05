<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {

    Category::create(['name' => 'home', 'parent_id' => null]);
    Category::create(['name' => 'entertainment', 'parent_id' => null]);
    Category::create(['name' => 'accessories', 'parent_id' => null]);
    Category::create(['name' => 'family', 'parent_id' => null]);
    Category::create(['name' => 'electronics', 'parent_id' => null]);
    Category::create(['name' => 'hobbies', 'parent_id' => null]);
    Category::create(['name' => 'vechiles', 'parent_id' => null]);

    Category::create(['name' => 'tools', 'parent_id' => 1]);
    Category::create(['name' => 'furniture', 'parent_id' => 1]);
    Category::create(['name' => 'household', 'parent_id' => 1]);
    Category::create(['name' => 'garden', 'parent_id' => 1]);
    Category::create(['name' => 'appliances', 'parent_id' => 1]);

    Category::create(['name' => 'games', 'parent_id' => 2]);
    Category::create(['name' => 'books', 'parent_id' => 2]);
    Category::create(['name' => 'movies', 'parent_id' => 2]);
    Category::create(['name' => 'music', 'parent_id' => 2]);

    Category::create(['name' => 'bags', 'parent_id' => 3]);
    Category::create(['name' => 'women', 'parent_id' => 3]);
    Category::create(['name' => 'men', 'parent_id' => 3]);
    Category::create(['name' => 'jewelry', 'parent_id' => 3]);

    Category::create(['name' => 'health', 'parent_id' => 4]);
    Category::create(['name' => 'beauty', 'parent_id' => 4]);
    Category::create(['name' => 'pets', 'parent_id' => 4]);
    Category::create(['name' => 'kids', 'parent_id' => 4]);
    Category::create(['name' => 'toys', 'parent_id' => 4]);

    Category::create(['name' => 'electronics', 'parent_id' => 5]);
    Category::create(['name' => 'computers', 'parent_id' => 5]);
    Category::create(['name' => 'laptops', 'parent_id' => 5]);
    Category::create(['name' => 'tablets', 'parent_id' => 5]);
    Category::create(['name' => 'phones', 'parent_id' => 5]);

    Category::create(['name' => 'bicycles', 'parent_id' => 6]);
    Category::create(['name' => 'arts', 'parent_id' => 6]);
    Category::create(['name' => 'sports', 'parent_id' => 6]);
    Category::create(['name' => 'autoparts', 'parent_id' => 6]);
    Category::create(['name' => 'musicals', 'parent_id' => 6]);
    Category::create(['name' => 'antiques', 'parent_id' => 6]);
  }
}
