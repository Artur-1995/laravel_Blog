<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;


class RegisterController extends LoginController
{
    public function create(Request $request, ...$user)
    {
        $user = Auth::user()->name ?? false;

        if ($user) {
            return redirect()->route('account');
        }
        return view('register.index', ['title' => 'Регистрация', 'cutString' => [$this, 'cutString'], 'menu' => $this->getMenu()]);
    }

    public function store(Request $request)
    {
        // Валидация введенных данных, нужно проверить введенные данные, перед добавлением в бд
        $request->validate([
            // Поле name должно быть обязательным и являтся строкой
            'name' => 'required|string',
            // Поле email обязательное, строка, являтся валидным email-ом, уникальное в колонке email таблицы users
            'email' => 'required|string|email|unique:users',
            // Поле password обязательное, проверка совпадения с полем подтверждения пороля
            'password' => 'required|confirmed|min:4',

        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),

        ]);
        Auth::login($user);
        session(['user' => $user]);

        return redirect()->route('account');
    }
}
