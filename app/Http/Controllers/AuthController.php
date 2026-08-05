<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class AuthController extends Controller
{
    // Show registration page
    public function index()
    {
        // Redirect if already logged in
        if (Auth::check()) {
            return redirect()->route('learning.hub');
        }

        return view('login');
    }

    // Show login page
    public function login()
    {
        if (Auth::check()) {
            return redirect()->route('learning.hub');
        }

        return view('signup');
    }

    // Process registration
    public function processRegister(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255', // Laravel expects a name field
            'email' => 'required|email|unique:users,email',
            'password' => [
                'required',
                'confirmed',
                Password::min(8)->letters()->numbers()->mixedCase()
            ]
        ]);

        if ($validator->fails()) {
            return redirect()->route('login')
                ->withErrors($validator)
                ->withInput();
        }

        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->role = 'user';
        $user->save();

        // Log in after registration
        Auth::login($user);

        return redirect()->route('learning.hub')->with('success', 'You have logged in successfully!');
    }

    // Authenticate user
    public function authenticate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('signup')
                ->withErrors($validator)
                ->withInput();
        }

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('learning.hub');
        }

        return redirect()->route('signup')->with('error', 'Either password or email is incorrect!');
    }

    // Logout user
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'You have logged out successfully!');
    }
}
