<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use App\Services\HashService;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }
    public function index()
    {
        return view('auth.register');
    }

    public function register(RegisterRequest $request, HashService $hashService)
    {
        $user = User::create($request->validated());

        $user->update(['password' => $hashService->hash($request->password)]);

        return redirect()->route('login')->with('success', 'Регистрация успешно выполнена');
    }
}
