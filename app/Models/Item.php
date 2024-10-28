<?php

namespace App\Models;

use App\Models\ItemCondition;
use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
  /** @use HasFactory<\Database\Factories\ItemFactory> */
  use HasFactory;

  protected $fillable = [
    'post_id',
    'item_condition_id',
    'brand'
  ];

  public function post()
  {
    return $this->belongsTo(Post::class);
  }

  public function itemCondition()
  {
    return $this->belongsTo(ItemCondition::class);
  }
}
