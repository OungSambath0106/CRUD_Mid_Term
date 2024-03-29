<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AccountController extends Controller
{
    public function create()
    {
        return view('auths.create');
    }

    public function store(Request $re)
    {
        $Validators = $this->validated($re->only(['name', 'email', 'password']));
        if ($Validators->fails()) {
            return back()->withErrors($Validators);
        }
        $user = $re->only(['name', 'email', 'password']);
        $user = $this->createUser($user);
        if ($user) {
            $credentials = $re->only('email', 'password');
            Auth::attempt($credentials);
            $re->session()->regenerate();
            return redirect()->route('employees.index');
        }
        return back()->with('message', "unable to create new user");
    }

    public function login(Request $re)
    {
        return view('auths.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials, $request->filled('remember'))) {
            $request->session()->regenerate();
            return to_route('dashboard')->withSuccess('You have successfully logged in!');
        }

        return back()->withErrors([
            'email' => 'Your provided credentials do not match in our records.',
        ])->onlyInput('email');
    }

    public function dashboard()
    {
        if (Auth::check()) {
            return view('auths.dashboard');
        }
        return redirect()->route('accounts.login')->withErrors([
            'email' => 'Please login to access the dashboard.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')->withSuccess('You have logged out successfully!');
    }

    private function validated(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|unique:users',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:4'
        ]);
    }

    private function createUser(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);
    }
}
