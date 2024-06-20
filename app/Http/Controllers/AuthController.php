<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Expr\FuncCall;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function logout()
    {
        auth()->logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect()->route('login')->with('success', 'logged out successfully !');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function authenticate()
    {
        $validated = request()->validate([
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);

        if (auth()->attempt($validated)) {
            request()->session()->regenerate();
            return redirect()->route('dashboard')->with('success', 'logged in successfully !');
        }

        return redirect()->route('login')->withErrors([
            'email' => 'no matching user found with the provided email and password!'
        ]);
    }

    public function store(Request $request)
    {
        $validated = request()->validate([
            'first_name' => 'required|max:14|min:4',
            'last_name' => 'required|max:14|min:4',
            'email' => 'required|email|unique:admins,email',
            'password' => 'required|confirmed|min:8',
            'image' => 'image',
        ]);

        if (request()->hasFile('image')) {
            $imagePath = request('image')->store('profile', 'public');
            $validated['image'] = $imagePath;
        }

        // because we have inheritance
        User::create([
            'name' => $validated['first_name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        Admin::create([
            'first_name' => $validated['first_name'],
            'last_name' => $validated['last_name'],
            'image' => $validated['image'], // Ensure to handle the case when no image is uploaded
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        return redirect()
            ->route('login')
            ->with('success', 'Account Created Successfully!');
    }
}
