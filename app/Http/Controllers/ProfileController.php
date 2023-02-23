<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\ChangePhoneRequest;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function show(User $user)
    {
        $meta = [
            'title' => "Профиль пользователя $user->login"
        ];
        return view('profile.show', compact('meta','user'));
    }

    public function edit(User $user)
    {
        $meta = [
            'title' => "Редактирование профиля"
        ];
        return view('profile.form', compact('meta','user'));
    }

    public function changePhone(ChangePhoneRequest $request, User $user)
    {
        return redirect()->route('profile.edit', $user->id);
    }
    public function changePassword(ChangePasswordRequest $request, User $user)
    {
        return redirect()->route('profile.edit', $user->id);
    }
}
