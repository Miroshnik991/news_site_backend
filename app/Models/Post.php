<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public function postTags()
    {
        return $this->hasMany(PostTag::class);
    }

    protected $fillable = [
      'title',
      'content',
    ];
}
