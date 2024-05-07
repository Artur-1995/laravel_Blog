<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function show(Request $request)
    {
        $answer = User::where('api_token', $request->token)->first() ?? 'Токен не найден!';
        if ($request->token == $answer->api_token) {
            $users = User::select('name', 'email')->get();
            return response()->json(['data' => $users], 200);
        } else {
            abort(401, $answer);
        }
    }
}
