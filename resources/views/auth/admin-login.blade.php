<!DOCTYPE html>
<html>
<head>
    <title>Login Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex items-center justify-center h-screen bg-gray-100">
    <div class="w-full max-w-sm p-6 bg-white rounded-lg shadow-md">
        <h2 class="text-2xl font-bold mb-4 text-center">Login Admin</h2>

        @if ($errors->any())
            <div class="mb-4 text-red-500 text-sm">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('admin.login.submit') }}">
            @csrf

            <div class="mb-4">
                <label class="block text-gray-700">Email</label>
                <input type="email" name="email" value="{{ old('email') }}"
                       class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:ring-indigo-200" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700">Password</label>
                <input type="password" name="password"
                       class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:ring-indigo-200" required>
            </div>

            <div class="mb-4 flex items-center">
                <input type="checkbox" name="remember" id="remember" class="mr-2">
                <label for="remember" class="text-gray-700">Ingat saya</label>
            </div>

            <button type="submit"
                    class="w-full bg-indigo-600 text-white py-2 rounded-lg hover:bg-indigo-700">
                Login
            </button>
        </form>
    </div>
</body>
</html>
