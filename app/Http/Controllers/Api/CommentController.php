<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\User;


class CommentController extends Controller
{
    public function show(Request $request)
    {
        $answer = User::where('api_token', $request->token)->first() ?? 'Токен не найден!';
        if ($request->token == $answer->api_token) {
            $comments = Comment::all();
            return response()->json(['data' => $comments], 200);
        } else {
            abort(401, $answer);
        }
    }
}
