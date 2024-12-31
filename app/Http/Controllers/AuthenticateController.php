<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthenticateController extends Controller
{

    public function showLoginForm()
    {
        return view('guest.login-user');
    }

    public function showRegisterForm()
    {
        return view('guest.register');
    }

    public function register(Request $request)
    {
        $user = User::query()
            ->where('email', $request->email)
            ->orWhere('username', $request->email)
            ->get()
            ->first();

        if($user){

             flash()->error('You are already registered');

            return back();
        }

        User::query()->insert([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'role' => 1,
            'verified' => 0,
        ]);

        flash()->success('You have been registered');

        return redirect()->route('user.dashboard');
    }

    public function authenticate(Request $request)
    {
            $request->validate([
               'username' => 'required|string',
               'password' => 'required|string'
            ]);

            if(Auth::attempt(['username' => $request->username, 'password' => $request->password])){

                $request->session()->regenerate();

                //redirect
                return redirect()->intended(Auth::user()->role == 2 ? '/admin/dashboard' : '/user/dashboard');
            }

            flash()->error('The provided credentials do not match our records.');

            return back();
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }



}
