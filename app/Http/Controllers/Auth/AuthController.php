<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function signup(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "name" => "required|string|max:255",
            "email" => "required|string|email|max:255|unique:users",
            "password" => "required|string|min:8",
        ]);

        if ($validator->fails()) {
            return to_route('signup_form')
                ->with('error', $validator->errors()->first())
                ->withInput();
        }
        try {
            User::create([
                "name" => strtolower($request->name),
                "email" => strtolower($request->email),
                "password" => Hash::make($request->password)
            ]);
            return to_route('signin_form')->with('success', 'Estas Registrado correctamente, ahora puedes iniciar sesion');
        } catch (\Exception $e) {
            return to_route('signup_form')->with('error', $e->getMessage());
        }
    }
    public function signin(Request $request)
    {
        $request->email = strtolower($request->email);
        $credentials = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        $remember = $request->filled('remember');

        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();
            return to_route('contact.index.get')->with('success', 'You are successfully logged in!');
        }

        throw ValidationException::withMessages([
            'email' => __('auth.failed'),
        ]);
    }

    public function signout(Request $request)
    {
        try {
            Auth::guest();
            request()->session()->invalidate();
            request()->session()->regenerateToken();
            return to_route('signin_form')->with('success', 'You are successfully logged out!');
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('error', $th->getMessage());
        }
    }
}
