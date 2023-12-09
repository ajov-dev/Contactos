<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function signup(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                "name" => "required|string|max:255",
                "email" => "required|string|email|max:255|unique:users",
                "password" => "required|string|min:8",
            ]);
            User::create([
                "name" => $request->name,
                "email" => $request->email,
                "password" => Hash::make($request->password)
            ]);
            return to_route('dashboard');
        } catch (\Exception $e) {
            return redirect('signin_form');
        }
    }
    public function signin(Request $request)
    {

        $credentials = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        $remember = $request->filled('remember');

        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();
            return to_route('dashboard')->with('status', 'You are successfully logged in!');
        }

        throw ValidationException::withMessages([
            'email' => __('auth.failed'),
        ]);
    }

    public function signout(Request $request)
    {
        Auth::guest();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return to_route('signin_form');
    }
}
