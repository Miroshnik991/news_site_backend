<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PosTtag extends Model
{
    use HasFactory;

    public function tag()
    {
        return $this->belongsTo(Tags::class);
    }
    
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
