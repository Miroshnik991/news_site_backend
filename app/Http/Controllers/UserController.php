<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;

class UserController extends Controller
{
    public function show($id)
    {
      $user = User::find($id);
      $posts = $user->posts;
      $posts->load(['tags'=> function($query) {
        $query->select('tag_name', 'tag_id as id');
      }]);
      return response()->json($user);
    }

    public function update(Request $request, $id)
    {
      $request->validate([
        'name' => 'required',
    ]);

      $user = User::find($id);
      $user->update(['name' => $request->name]);

      return $user;
    }
  }
