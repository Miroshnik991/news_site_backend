<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $hidden = ['pivot'];

    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }

    protected $fillable = [
      'tag_name',
    ];
}
