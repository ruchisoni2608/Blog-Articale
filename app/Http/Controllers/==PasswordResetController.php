<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class PasswordResetController extends Controller
{
    public function showResetForm()
    {
        return view('Auth.passwordsreset');
    }
    public function reset(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6|confirmed',
        ]);

        $user = User::where('email', $request->email)->first();

        if ($user) {
            $user->update([
                'password' => Hash::make($request->password)
            ]);

            return redirect('login')->withSuccess('Password reset successfully.');
        } else {
            return back()->withErrors(['email' => 'Email not found.'])->withInput();
        }
    }


}