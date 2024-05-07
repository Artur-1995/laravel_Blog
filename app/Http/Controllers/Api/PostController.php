<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{
    public function show(Request $request)
    {
        $answer = User::where('api_token', $request->token)->first() ?? 'Токен не найден!';
        if ($request->token == $answer->api_token) {
            $posts = Post::all();
            return response()->json(['data' => $posts], 200);
        } else {
            abort(401, $answer);
        }
    }
}
