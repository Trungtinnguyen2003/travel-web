<?php

namespace App\Http\Controllers\Auth;

use App\Models\Account;
use App\Models\Customer;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Middleware\VerifyCsrfToken;

class RegisterController extends Controller
{
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        // Validate form data
        $validatedData = $request->validate([
            'username' => 'required|string|max:255|unique:accounts',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Create new user
        $user = new Account();
        $user->username = $validatedData['username'];
        $user->password = Hash::make($validatedData['password']);
        $user->role = 'Customer';
        $user->rank_account = 'Bronze';
        $user->save();

        // Redirect to login page or any other page
        return redirect('/login')->with('success', 'Registration successful! Please login.');
    }
}
