<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>

    <!-- TAILWIND CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

    <div class="flex justify-center items-center min-h-screen">

        <div class="bg-white p-8 rounded-2xl shadow-lg w-full max-w-md border">

            <!-- Title -->
            <h2 class="text-3xl font-bold text-center mb-8 text-gray-700">
                Login
            </h2>

            <!-- FORM LOGIN -->
            <form action="{{ route('login.submit') }}" method="POST" class="space-y-5">
                @csrf

                <!-- Email -->
                <div>
                    <label class="text-gray-600 font-medium">Email</label>
                    <input 
                        type="email"
                        name="email"
                        required
                        class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
                        placeholder="Masukkan email admin">
                </div>

                <!-- Password -->
                <div>
                    <label class="text-gray-600 font-medium">Password</label>
                    <input 
                        type="password"
                        name="password"
                        required
                        class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
                        placeholder="Masukkan password">
                </div>

                <!-- Button -->
                <button 
                    type="submit"
                    class="w-full bg-blue-600 text-white py-2 rounded-lg text-lg font-semibold hover:bg-blue-700 transition">
                    Login
                </button>

            </form>

            <p class="text-center mt-4 text-sm">
            Belum punya akun?
            <a href="{{ route('register') }}" class="text-blue-600 font-semibold">Register</a>
        </p>

            <!-- Error Message -->
            @if(session('error'))
                <p class="text-red-600 text-center mt-4 text-sm">
                    {{ session('error') }}
                </p>
            @endif

        </div>

    </div>

</body>
</html>
