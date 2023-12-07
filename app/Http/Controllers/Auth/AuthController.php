<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

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
            return response()->json($validator->errors(), 400);
        }
        $user = User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => Hash::make($request->password)
        ]);

        $token = $user->createToken("auth_token")->plainTextToken;

        return response()->json([
            'user' => $user,
            'access_token' => $token,
            'token_type' => 'Bearer',
            'message' => 'User created successfully',
        ], 201);
    }
    public function signin(Request $request)
    {
        $credentials = Request()->only('email', 'password');

        if (Auth::attempt($credentials)) {
            Request()->session()->regenerate();
            return redirect('dashboard');
        }
        return dump('failed');
    }

    public function signout(Redirector $redirect, Request $request)
    {
        Auth::guest();
        $request->session()->invalidate();
        $request->session()->regenerateToken();


        return redirect('dashboard');
    }
}
