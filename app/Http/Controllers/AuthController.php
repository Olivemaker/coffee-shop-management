<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Users;

class AuthController extends Controller
{

    // отображение формы регистрации
    public function showRegistrationForm(){
        return view('auth.register');
    }
     public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);
        
        return redirect()->route('menu');
    }


    public function showLoginForm(){
        return view('auth.login');
    }
    public function login(Request $request)
    {
        
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    // // Отображение формы запроса сброса пароля через email
    // public function showResetRequestForm()
    // {
    //     return view('auth.passwords.email');
    // }

    // // ссылка на сброс пароля
    // public function sendResetLink(Request $request)
    // {
    //     $request->validate(['email' => 'required|email']);

    //     $user = Users::where('email', $request->email)->first();

    //     if (!$user) {
    //         return back()->withErrors(['email' => 'Пользователь с таким логином не найден.']);
    //     }

    //     // Генерация токена и отправка письма
    //     $token = app('auth.password.broker')->createToken($user);
    //     $url = route('password.reset', ['token' => $token]);

    //     // Отправка email
    //     Mail::send('auth.passwords.reset_email', ['url' => $url], function ($message) use ($user) {
    //         $message->to($user->email);
    //         $message->subject('Сброс пароля');
    //     });
    //     return back()->with('status', 'Ссылка для сброса пароля отправлена на ваш email.');
    // }

    // // отображения формы создания нового пароя
    // public function showResetForm($token)
    // {
    //     return view('auth.passwords.reset')->with(['token' => $token]);
    // }

    // // логика обновления пароля
    // public function reset(Request $request)
    // {
    //     $request->validate([
    //         'login' => 'required',
    //         'password' => 'required|string|min:8|confirmed',
    //         'token' => 'required'
    //     ]);

    //     $credentials = $request->only('login', 'password', 'token');

    //     // Здесь вы можете использовать Password::reset() или свою логику для сброса пароля
    //     Password::reset($credentials, function ($user) use ($request) {
    //         $user->password = Hash::make($request->password);
    //         $user->save();
    //     });

    //     return redirect()->route('login')->with('status', 'Ваш пароль был сброшен!');
    // }

    // public function logout(Request $request)
    //    {
    //         Auth::logout();
    //         return redirect('login');
    //    }
}
