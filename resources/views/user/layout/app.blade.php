<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Lombanesia - Platform Lomba Terlengkap')</title>
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('favicon.png') }}" type="image/x-icon">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Custom Styles -->
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        .cloud-bg {
            background-image: url("{{ asset('images/cloud-bg.png') }}");
            background-repeat: repeat-x;
            background-position: bottom;
        }
        .bookmark-btn.active {
            color: #3b82f6;
        }
    </style>

    @yield('styles')
</head>
<body class="bg-gray-50">

    <!-- Header -->
    @include('user.layout.header')

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    @include('user.layout.footer')

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // Bookmark functionality
        $(document).ready(function() {
            $('.bookmark-btn').click(function() {
                $(this).toggleClass('active');
            });
        });
    </script>

    @stack('scripts')
</body>
</html>
