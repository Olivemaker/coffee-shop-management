<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

use App\Models\Users;

class PasswordResetController extends Controller
{
    // отправка ссылки на форму для создания нового пароя
    public function sendResetLink(Request $request)
    {
        $request->validate(['email' => 'required|email']);
        $user = Users::where('email', $request->email)->first();
        if (!$user) {
            return back()->withErrors(['email' => 'Неверно указана почта.']);
        }
        // Генерация токена и отправка письма
        $token = app('auth.password.broker')->createToken($user);
        $url = route('password.reset', ['token' => $token]);
        // Отправка email
        Mail::send('auth.passwords.reset_email', ['url' => $url], function ($message) use ($user) {
            $message->to($user->email);
            $message->subject('Сброс пароля');
        });
        return back()->with('status', 'Ссылка для сброса пароля отправлена на ваш email.');
    }

    // создание нового пароля
    public function reset(Request $request)
    {
        $request->validate([
            'login' => 'required',
            'password' => 'required|confirmed|min:6',
        ]);
        $user = Users::where('login', $request->login)->first();

        if (!$user) {
            return back()->withErrors(['login' => 'Пользователь не найден.']);
        }
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect()->route('login')->with('status', 'Пароль успешно изменен.');
    }

    public function showLinkRequestForm(){
        return view('auth.passwords.email');
    }

    public function showResetForm($token){
        return view('auth.passwords.reset')->with(['token' => $token]);
    }

}
