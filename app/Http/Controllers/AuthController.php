<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginFormRequest;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    public function login(): View
    {
        return view('admin.auth.login');
    }

    public function signIn(LoginFormRequest $request): RedirectResponse
    {
        $remember_me = ($request->remember_me == 1) ? true : false;

        if (!Auth::attempt($request->validated(), $remember_me)){
            return back()->withErrors([
                'email' => 'Пароль или логин неверные'
            ])->onlyInput('email');
        }

//        $user = User::find(Auth::id());
//        $user->update(['last_login' => now()]);
//
//        Log::info('Пользователь прошел аутентификацию.', ['auth_id' => Auth::id()]);

        $user = tap(User::find(Auth::id()), function ($user){

            Log::info("Пользователь {$user->id} залогинился");

        })->update(['last_login' => now()]);

        $request->session()->regenerate();

        return redirect()->intended();
    }

    public function logout(): RedirectResponse
    {
        auth()->logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect('/admin');
    }
}
