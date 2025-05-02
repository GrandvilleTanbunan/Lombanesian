@extends('user.layout.app')

@section('title', 'Register - Lombanesia')

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
    .login-type-tab {
        transition: all 0.3s ease;
        border-radius: 0;
    }
    .login-type-tab.active {
        background-color: #2563eb;
        color: white;
    }
    .login-option {
        display: none;
    }
    .login-option.active {
        display: block;
    }
    /* Wave shape removed */
    .brand-caption {
        margin-top: 1.5rem;
        line-height: 1.6;
    }

    @media (max-width: 768px) {
        .auth-card {
            flex-direction: column;
            max-width: 500px;
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
                <h1 class="text-2xl font-bold mb-6 text-gray-800">Daftar Akun Baru</h1>

                @if($errors->any())
                    <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
                        <ul class="list-disc pl-4">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('register') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="name" class="block text-gray-700 text-sm font-medium mb-2">Nama Lengkap</label>
                        <input type="text" name="name" id="name" value="{{ old('name') }}" class="form-input w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none" placeholder="Masukkan nama lengkap Anda" required>
                    </div>

                    <!-- Login Type Tabs -->
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-medium mb-2">Pilih Metode Login</label>
                        <div class="flex rounded-lg overflow-hidden border border-gray-300">
                            <button type="button" id="email-tab" class="login-type-tab w-1/2 py-2 text-center font-medium {{ old('login_type', 'email') == 'email' ? 'active' : '' }}">Email</button>
                            <button type="button" id="phone-tab" class="login-type-tab w-1/2 py-2 text-center font-medium {{ old('login_type') == 'phone' ? 'active' : '' }}">Nomor HP</button>
                        </div>
                        <input type="hidden" name="login_type" id="login_type" value="{{ old('login_type', 'email') }}">
                    </div>

                    <!-- Email Option -->
                    <div id="email-option" class="login-option {{ old('login_type', 'email') == 'email' ? 'active' : '' }} mb-4">
                        <label for="email" class="block text-gray-700 text-sm font-medium mb-2">Email</label>
                        <input type="email" name="email" id="email" value="{{ old('email') }}" class="form-input w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none" placeholder="Masukkan email Anda">
                    </div>

                    <!-- Phone Option -->
                    <div id="phone-option" class="login-option {{ old('login_type') == 'phone' ? 'active' : '' }} mb-4">
                        <label for="phone" class="block text-gray-700 text-sm font-medium mb-2">Nomor Handphone</label>
                        <input type="tel" name="phone" id="phone" value="{{ old('phone') }}" class="form-input w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none" placeholder="Masukkan nomor handphone Anda">
                    </div>

                    <div class="mb-4">
                        <label for="password" class="block text-gray-700 text-sm font-medium mb-2">Password</label>
                        <input type="password" name="password" id="password" class="form-input w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none" placeholder="Minimal 8 karakter" required>
                    </div>

                    <div class="mb-6">
                        <label for="password_confirmation" class="block text-gray-700 text-sm font-medium mb-2">Konfirmasi Password</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-input w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none" placeholder="Masukkan ulang password" required>
                    </div>

                    <button type="submit" class="w-full bg-blue-600 text-white font-medium py-3 px-4 rounded-3xl hover:bg-blue-700 transition-colors focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                        Daftar Sekarang
                    </button>
                </form>

                <div class="mt-6 text-center">
                    <p class="text-gray-600">Sudah punya akun?
                        <a href="{{ route('login') }}" class="text-blue-600 font-medium hover:underline">Masuk di sini</a>
                    </p>
                </div>
            </div>

            <!-- Brand Section -->
            <div class="auth-brand-section relative">
                <div class="brand-logo">
                    <img src="{{ asset('images/logo.PNG') }}" alt="Lombanesia Logo" class="w-full h-full object-contain">
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

@push('scripts')
<script>
    $(document).ready(function() {
        // Handle login type tabs
        $('#email-tab, #phone-tab').click(function() {
            // Update tabs
            $('.login-type-tab').removeClass('active');
            $(this).addClass('active');

            // Update login type value
            var loginType = (this.id === 'email-tab') ? 'email' : 'phone';
            $('#login_type').val(loginType);

            // Toggle input fields
            $('.login-option').removeClass('active');
            if (loginType === 'email') {
                $('#email-option').addClass('active');
            } else {
                $('#phone-option').addClass('active');
            }
        });
    });
</script>
@endpush
