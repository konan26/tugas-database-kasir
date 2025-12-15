<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
<div class="flex justify-center items-center min-h-screen">
    <div class="bg-white p-8 rounded-xl shadow-lg w-full max-w-md">

        <h2 class="text-2xl font-bold text-center mb-6">Register</h2>

        <form method="POST" action="{{ route('register.submit') }}" class="space-y-4">
            @csrf

            <input type="text" name="name" placeholder="Nama"
                   class="w-full px-4 py-2 border rounded-lg" required>

            <input type="email" name="email" placeholder="Email"
                   class="w-full px-4 py-2 border rounded-lg" required>

            <input type="password" name="password" placeholder="Password"
                   class="w-full px-4 py-2 border rounded-lg" required>

            <input type="password" name="password_confirmation" placeholder="Konfirmasi Password"
                   class="w-full px-4 py-2 border rounded-lg" required>

            <select name="role" class="w-full px-4 py-2 border rounded-lg" required>
                <option value="">-- Pilih Role --</option>
                <option value="admin">Admin</option>
                <option value="petugas">Petugas</option>
            </select>

            <button class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700">
                Register
            </button>
        </form>

        <p class="text-center mt-4 text-sm">
            Sudah punya akun?
            <a href="{{ route('login') }}" class="text-blue-600 font-semibold">Login</a>
        </p>

    </div>
</div>
</body>
</html>
