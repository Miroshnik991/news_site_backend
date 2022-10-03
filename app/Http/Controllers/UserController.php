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
        'avatar' => 'nullable',
    ]);

    $user = User::find($id);

      if (empty($_FILES)) {
        $user->update([
          'name' => $request->name,
        ]);
   } else {
      $avatarName = $_FILES['avatar']['name'];
      $tmpName = $_FILES['avatar']['tmp_name'];
      $avatarsDirectory = 'avatars/';
      $fullAvatarPath = $avatarsDirectory . basename($avatarName);

      move_uploaded_file($tmpName, $fullAvatarPath);

      $user->update([
        'name' => $request->name,
        'avatar' => '/'.$avatarsDirectory.$avatarName,
      ]);
   }
   
      return $user;
    }
  }
