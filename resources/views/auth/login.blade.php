@extends('user.layout.app')

@section('title', 'Login - Lombanesia')

@section('styles')
<style>
    .auth-container {
        min-height: 80vh;
        display: flex;
        align-items: center;
    }
    .auth-card {
        display: flex;
        max-width: 900px;
        margin: 0 auto;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        border-radius: 1rem;
        overflow: hidden;
    }
    .auth-form-section {
        width: 50%;
        padding: 2.5rem;
        background-color: white;
    }
    .auth-brand-section {
        width: 50%;
        padding: 2.5rem;
        background: linear-gradient(135deg, #3b82f6 0%, #1e40af 100%);
        color: white;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        text-align: center;
    }
    .form-input {
        transition: all 0.2s ease;
        border-radius: 0.5rem;
    }
    .form-input:focus {
        border-color: #3b82f6;
        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.2);
    }
    .brand-logo {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        background-color: white;
        padding: 1rem;
        margin-bottom: 1.5rem;
    }
    /* Wave shape removed */
    .brand-caption {
        margin-top: 1.5rem;
        line-height: 1.6;
    }

    @media (max-width: 768px) {
        .auth-card {
            flex-direction: column;
            max-width: 450px;
        }
        .auth-form-section, .auth-brand-section {
            width: 100%;
        }
        .auth-brand-section {
            order: -1;
            padding: 2rem 1.5rem;
        }
    }
</style>
@endsection

@section('content')
<div class="py-10 px-4 bg-gray-50 auth-container">
    <div class="container mx-auto">
        <div class="auth-card">
            <!-- Form Section -->
            <div class="auth-form-section">
                <h1 class="text-2xl font-bold mb-6 text-gray-800">Selamat Datang Kembali!</h1>

                @if(session('success'))
                    <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
                        {{ session('success') }}
                    </div>
                @endif

                @if($errors->any())
                    <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
                        <ul class="list-disc pl-4">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="login" class="block text-gray-700 text-sm font-medium mb-2">Email atau Nomor HP</label>
                        <input type="text" name="login" id="login" value="{{ old('login') }}" class="form-input w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none" placeholder="Masukkan email atau nomor HP">
                    </div>

                    <div class="mb-6">
                        <label for="password" class="block text-gray-700 text-sm font-medium mb-2">Password</label>
                        <input type="password" name="password" id="password" class="form-input w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none" placeholder="Masukkan password">
                    </div>

                    <div class="flex items-center justify-between mb-6">
                        <div class="flex items-center">
                            <input type="checkbox" name="remember" id="remember" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                            <label for="remember" class="ml-2 block text-sm text-gray-700">Ingat saya</label>
                        </div>

                        <a href="#" class="text-sm text-blue-600 hover:underline">Lupa password?</a>
                    </div>

                    <button type="submit" class="w-full bg-blue-600 text-white font-medium py-3 px-4 rounded-3xl hover:bg-blue-700 transition-colors focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                        Masuk
                    </button>
                </form>

                <div class="mt-6 text-center">
                    <p class="text-gray-600">Belum punya akun?
                        <a href="{{ route('register') }}" class="text-blue-600 font-medium hover:underline">Daftar sekarang</a>
                    </p>
                </div>
            </div>

            <!-- Brand Section -->
            <div class="auth-brand-section relative">
                <div class="brand-logo">
                    <img src="{{ asset('images/logo.png') }}" alt="Lombanesia Logo" class="w-full h-full object-contain">
                </div>
                <h2 class="text-3xl font-bold mb-2">Lombanesia</h2>
                <p class="text-blue-100 text-sm">Platform Lomba Terlengkap</p>

                <div class="brand-caption text-l">
                    <p><span class="font-bold">Lombanesia</span> adalah sebuah website yang menyediakan informasi terkini mengenai lomba yang relevan untuk setiap program studi yang ada di Petra Christian University.</p>
                </div>

                <!-- Wave Shape removed -->
            </div>
        </div>
    </div>
</div>
@endsection
