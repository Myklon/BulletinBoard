<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\ChangePhoneRequest;
use App\Models\User;
use App\Services\HashService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function showProfile(User $user)
    {
        $products = $user->products()->orderByDesc('id')->paginate(8);
        return view('profile.show', compact('user', 'products'));
    }

    public function editProfileForm(Request $request, User $user)
    {
        $this->authorize('edit', $user);
        return view('profile.form', compact('user'));
    }

    public function changePhone(ChangePhoneRequest $request, User $user)
    {
        $this->authorize('edit', $user);
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
        $this->authorize('edit', $user);
        if (!$hashService->validate($request->old_password, $user->password)) {
            return redirect()->route('profile.edit', $user->id)->withErrors(['password' => __('profileSettings.changePassword.fail.password')]);
        }

        $user->update(['password' => $hashService->hash($request->new_password)]);

        return redirect()->route('profile.show', $user->id)->with(['success' => __('profileSettings.changePassword.success.success')]);
    }
}
