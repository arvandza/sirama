<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    @toastifyCss
    @toastifyJs
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>

<body class="bg-gray-100 min-h-screen flex items-center justify-center">

    <div class="bg-white rounded-xl shadow-lg max-w-5xl w-full flex flex-col md:flex-row overflow-hidden">
        <!-- Form Section -->
        <div class="w-full md:w-1/2 p-8 md:p-12">
            <h1 class="text-2xl font-bold mb-2">Masuk</h1>
            <p class="text-sm text-gray-600 mb-6">Selamat datang di Sistem Informasi Aspirasi Mahasiswa</p>

            <form action="{{ route('auth') }}" method="POST" class="space-y-4">
                @csrf
                @method('POST')
                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" id="email" name="email" required
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <div class="relative">
                        <input type="password" id="password" name="password" required
                            class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 pr-10">
                        <span class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-400 cursor-pointer">
                            <!-- Eye Icon -->
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                </path>
                            </svg>
                        </span>
                    </div>
                </div>

                <!-- Remember + Forgot -->
                <div class="flex items-center justify-between text-sm">
                    <label class="flex items-center space-x-2">
                        <input type="checkbox" class="form-checkbox text-blue-600">
                        <span>Remember me</span>
                    </label>

                </div>

                <!-- Button -->
                <button type="submit"
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 rounded-lg font-semibold">
                    Masuk
                </button>
            </form>
        </div>

        <!-- Image Section -->
        <div class="w-full md:w-1/2 bg-gray-50 flex items-center justify-center p-6">
            <img src="{{ asset('images/bg.png') }}" alt="login illustration" class="w-full max-w-md">
        </div>
    </div>

</body>

</html>
