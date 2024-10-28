<?php

use App\Models\Post;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  /**
   * Run the migrations.
   */
  public function up(): void
  {
    Schema::create('houses', function (Blueprint $table) {
      $table->id();
      $table->foreignIdFor(Post::class);
      $table->unsignedTinyInteger('bedrooms');
      $table->unsignedTinyInteger('bathrooms');
      $table->unsignedTinyInteger('living_rooms');
      $table->unsignedTinyInteger('floor');
      $table->boolean('heating_system')->default(false);
      $table->boolean('air_conditioner')->default(false);
      $table->boolean('parking')->default(false);
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('houses');
  }
};
