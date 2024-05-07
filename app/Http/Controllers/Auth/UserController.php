<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Menu;
use App\Models\User;

class UserController extends Controller
{
    public static function getMenu()
    {
        $menu = Menu::all();
        return $menu;
    }
    public static function cutString(string $line, int $length = 12, string $appends = '...'): string
    {
        if (mb_strlen($line) > $length) {
            $line = mb_substr($line, 0, $length) . $appends;
        }
        return $line;
    }
    public function index()
    {
        $user = Auth::user() ?? '';
        if (Auth::check()) {
            return view('account.index', ['title' => 'Личный кабинет', 'cutString' => [$this, 'cutString'], 'menu' => $this->getMenu(), 'user' => $user]);
        }
        return redirect()->route('login');
    }
    public function store(Request $request, $userId)
    {
        $user = User::find($userId);
        $user->api_token = Str::random(80);
        $user->save();
        return redirect()->route('account');
    }
}
