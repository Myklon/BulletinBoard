<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Services\HashService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __construct()
    {
       // $this->middleware('guest');

//        $this->middleware('redirect_if_authenticated')->only(['login']);
    }
    public function index()
    {
        return view('auth.login');
    }
    public function login(LoginRequest $request)
    {
        if (Auth::attempt($request->validated()))
            return redirect()->route('profile.show', Auth::id())->with('success', 'Вход успешно выполнен');
        return redirect()->route('login')->withInput($request->only('login'))->withErrors(['auth' => 'Неверный логин или пароль']);
    }
}
