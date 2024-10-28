<?php

namespace App\Models;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Vehicle extends Model
{
  /** @use HasFactory<\Database\Factories\VehicleFactory> */
  use HasFactory;

  protected $fillable = [
    'post_id',
    'year',
    'make',
    'model'
  ];

  public function post(): BelongsTo
  {
    return $this->belongsTo(Post::class);
  }
}
