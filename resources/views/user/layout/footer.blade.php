<footer class="bg-blue-600 text-white pt-8 pb-4 rounded-t-3xl">
    <div class="container mx-auto px-4 rounded-t-3xl ">
        <div class="flex flex-col items-center mb-6 rounded-t-3xl">
            <!-- Logo -->
            <div class="flex items-center mb-4">
                <img src="{{ asset('images/logo.png') }}" alt="Lombanesia Logo" class="h-10 mr-2">
                <span class="text-white text-2xl font-bold">Lombanesia</span>
            </div>

            <!-- Footer Links -->
            <div class="text-center space-y-2">
                <a href="{{ url('/about') }}" class="block text-white hover:underline">About Us</a>
                <a href="{{ url('/contact') }}" class="block text-white hover:underline">Contact Us</a>
                <a href="{{ url('/privacy') }}" class="block text-white hover:underline">Privacy Policy</a>
            </div>

            <!-- Social Media -->
            <div class="mt-6 text-center">
                <p class="mb-2">Follow Us</p>
                <div class="flex justify-center space-x-4">
                    <a href="#" class="text-white hover:text-gray-200">
                        <i class="fab fa-instagram text-2xl"></i>
                    </a>
                    <a href="#" class="text-white hover:text-gray-200">
                        <i class="fab fa-whatsapp text-2xl"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- Copyright -->
        <div class="text-center text-sm text-blue-200">
            <p>&copy; {{ date('Y') }} Lombanesia. All rights reserved.</p>
        </div>
    </div>
</footer>
