<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthFormController extends Controller
{
    //
    public function signup_form(Request $request)
    {
        return view('auth_form', [
            'title' => 'Sign Up',
            'id_form' => 'signup_form',
            'action' => 'signup',
            'context_button' => 'Registrarme.',
            'context_link' => 'tienes una cuenta?',
            'redirect_link' => 'signin_form',
            'success_link' => 'signin_form'
        ]);
    }
    public function signin_form(Request $request)
    {
        return view('auth_form', [
            'title' => 'Sign In',
            'id_form' => 'signin_form',
            'action' => 'signin',
            'context_button' => 'iniciar sesión.',
            'context_link' => 'no tienes una cuenta?',
            'redirect_link' => 'signup_form',
            'success_link' => 'dashboard'
        ]);
    }
}
