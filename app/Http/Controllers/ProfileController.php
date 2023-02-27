<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\ChangePhoneRequest;
use App\Models\User;
use App\Services\HashService;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function showProfile(User $user)
    {
        return view('profile.show', compact('user'));
    }

    public function editProfileForm(User $user)
    {
        $this->authorize('isOwner', $user);
        return view('profile.form', compact('user'));
    }

    public function changePhone(ChangePhoneRequest $request, User $user)
    {
        $this->authorize('isOwner', $user);
        $user->update($request->validated());

        return redirect()->route('profile.show', $user->id)->with(
            ['success' => __('profileSettings.changePhone.success.success')]
        );
    }

    public function changePassword(
        ChangePasswordRequest $request,
        User $user,
        HashService $hashService
    ) {
        $this->authorize('isOwner', $user);
        if (!$hashService->validate($request->old_password, $user->password)) {
            return redirect()->route('profile.edit', $user->id)->withErrors(['password' => __('profileSettings.changePassword.fail.password')]);
        }

        $user->update(['password' => $hashService->hash($request->new_password)]);

        return redirect()->route('profile.show', $user->id)->with(['success' => __('profileSettings.changePassword.success.success')]);
    }
}
