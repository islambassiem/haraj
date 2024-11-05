<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Category extends Model
{
  /** @use HasFactory<\Database\Factories\CategoryFactory> */
  use HasFactory;
  use HasUuids;

  public function uniqueIds(): array
  {
    return ['uuid'];
  }

  public function getRouteKeyName(): string
  {
      return 'uuid';
  }

  protected $fillable = [
    'name',
    'parent_id'
  ];

  public function parent(): BelongsTo
  {
    return $this->belongsTo(Category::class, 'parent_id');
  }
}
