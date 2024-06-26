<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\AuthRequest;
use App\Http\Requests\Backend\UpdateProfileRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use ProtoneMedia\Splade\Facades\Toast;

class BackendLoginController extends Controller
{
    protected function credentials(Request $request)
    {
        return $request->only($this->username(), 'password');
    }

    public function login(AuthRequest $request)
    {
        $credentials = $request->only('login', 'password');
        $remember = $request->get('remember');

        if (Auth::guard('admin')->attempt($credentials, $remember)) {
            return redirect()->route('backend.dashboard');
        }

        // Authentication failed, redirect back with input.
        return redirect()->back()->withErrors(['login' => 'Invalid credentials']);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('backend.login');
    }

    public function edit()
    {
        return view('backend.pages.profile.edit', [
            'user' => auth()->user()
        ]);
    }

    public function update(UpdateProfileRequest $request)
    {
        try {
            $user = auth()->user();

            $user->update([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'password' => Hash::make($request->new_password),
            ]);

            Toast::title('Profile update')
                ->autoDismiss(5);

            return redirect()->route('backend.dashboard');
        } catch (\Exception $e) {
            Toast::warning()
                ->title('Error creating backend user parameter: ' . $e->getMessage())
                ->autoDismiss(5);
        }
    }
}
