<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class UsersController extends Controller
{
    public function regis()
    {
        return view('auth.register');
    }

    public function regisreq(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'min:3'],
            'username' => ['required', 'unique:users', 'alpha_num', 'min:4', 'max:25'],
            'email' => ['required', 'unique:users', 'email'],
            'password' => ['required', 'min:4']
        ]);

        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        session()->flash('success', 'Admin baru berhasil terdaftar');
        return redirect('/');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function loginreq(Request $request)
    {
        $attributes = $request->validate([
            'username' => ['required', 'alpha_num'],
            'password' => ['required']
        ]);

        if (Auth::attempt($attributes)) {
            return redirect('/')->with('success', 'Admin berhasil masuk');
        }

        throw ValidationException::withMessages([
            'email' => 'email atau password yang anda masukkan salah',
            'password' => 'email atau password yang anda masukkan salah'
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        return redirect('/');
    }
}
