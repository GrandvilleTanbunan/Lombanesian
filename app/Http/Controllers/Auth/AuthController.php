<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    // Menampilkan halaman login
    public function showLoginForm()
    {
        if (Auth::check()) {
            return redirect()->route('home');
        }

        return view('auth.login');
    }

    // Proses login
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'login' => 'required',
            'password' => 'required',
        ], [
            'login.required' => 'Email atau nomor handphone diperlukan',
            'password.required' => 'Password diperlukan',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput($request->except('password'));
        }

        $login = $request->input('login');
        $field = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'phone';

        if (Auth::attempt([$field => $login, 'password' => $request->input('password')])) {
            return redirect()->intended(route('home'))
                ->with('success', 'Anda berhasil login!');
        }

        return redirect()->back()
            ->withInput($request->except('password'))
            ->withErrors(['login' => 'Email/nomor handphone atau password Anda salah!']);
    }

    // Menampilkan halaman register
    public function showRegisterForm()
    {
        if (Auth::check()) {
            return redirect()->route('home');
        }

        return view('auth.register');
    }

    // Proses registrasi
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'login_type' => 'required|in:email,phone',
            'email' => 'required_if:login_type,email|email|unique:users,email|nullable',
            'phone' => 'required_if:login_type,phone|unique:users,phone|nullable',
            'password' => 'required|string|min:8|confirmed',
        ], [
            'name.required' => 'Nama lengkap diperlukan',
            'login_type.required' => 'Pilih metode login',
            'login_type.in' => 'Pilihan metode login tidak valid',
            'email.required_if' => 'Email diperlukan jika login dengan email',
            'email.email' => 'Format email tidak valid',
            'email.unique' => 'Email sudah digunakan',
            'phone.required_if' => 'Nomor handphone diperlukan jika login dengan no. HP',
            'phone.unique' => 'Nomor handphone sudah digunakan',
            'password.required' => 'Password diperlukan',
            'password.min' => 'Password minimal 8 karakter',
            'password.confirmed' => 'Konfirmasi password tidak cocok',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput($request->except('password', 'password_confirmation'));
        }

        // Create new user
        $user = new User();
        $user->name = $request->input('name');

        if ($request->input('login_type') == 'email') {
            $user->email = $request->input('email');
        } else {
            $user->phone = $request->input('phone');
        }

        $user->password = Hash::make($request->input('password'));
        $user->save();

        // Auto login after registration
        Auth::login($user);

        return redirect()->route('home')
            ->with('success', 'Akun Anda berhasil dibuat dan Anda telah login!');
    }

    // Proses logout
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home')
            ->with('success', 'Anda berhasil logout');
    }
}
