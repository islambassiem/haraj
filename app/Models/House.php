<?php

namespace App\Models;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class House extends Model
{
  /** @use HasFactory<\Database\Factories\HouseFactory> */
  use HasFactory;

  protected $fillable = [
    'post_id',
    'bedrooms',
    'bathrooms',
    'living_rooms',
    'floor',
    'heating_system',
    'air_conditioner',
    'parking',
  ];

  public function post(): BelongsTo
  {
    return $this->belongsTo(Post::class);
  }
}
