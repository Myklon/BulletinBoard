<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use App\Services\HashService;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {
        $meta = [
            'title' => 'Регистрация'
            ];
        return view('auth.register', compact('meta'));
    }

    public function register(RegisterRequest $request, HashService $hashService)
    {
        $user = User::create($request->validated());

        $user->update(['password' => $hashService->hash($request->password)]);

        return redirect()->route('login.form');
//        return response()->json($user);
    }
}
