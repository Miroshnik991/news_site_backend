<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;

class UserController extends Controller
{
    public function show($id)
    {
      $user =  User::where('id', '=', $id)->first();
      $posts =  Post::with('user', 'tags')->where('user_id', '=', $user -> id)->get();
      return response()->json(['user' => $user, 'posts' => $posts]);

    }
}
