<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Create Account</title>

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#6366f1',      // indigo-500
                        primarydark: '#4f46e5',  // indigo-600
                    }
                }
            }
        }
    </script>

    <!-- Google Font: Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet"/>

    <style>
        body {
            font-family: 'Inter', system-ui, sans-serif;
        }
    </style>
</head>

<body class="h-full bg-gray-50 flex items-center justify-center p-4 sm:p-6 lg:p-8">

<div class="w-full max-w-md space-y-8">

    <!-- Header -->
    <div class="text-center">
        <h1 class="text-3xl font-bold tracking-tight text-gray-900">
            Create your account
        </h1>
        <p class="mt-2 text-sm text-gray-600">
            Join us and get started today
        </p>
    </div>

    <!-- Success / Error Messages -->
    @if(session('success'))
        <div class="bg-green-50 border-l-4 border-green-500 p-4 rounded-r-lg">
            <p class="text-sm text-green-700">{{ session('success') }}</p>
        </div>
    @endif

    @if ($errors->any())
        <div class="bg-red-50 border-l-4 border-red-500 p-4 rounded-r-lg">
            <ul class="text-sm text-red-700 list-disc pl-5 space-y-1">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
@endif

<!-- Registration Form -->
    <form method="POST" action="/register" class="mt-8 space-y-6">
    @csrf

    <!-- Full Name -->
        <div>
            <label for="name" class="block text-sm font-medium text-gray-700">
                Full name
            </label>
            <div class="mt-1">
                <input
                    id="name"
                    name="name"
                    type="text"
                    autocomplete="name"
                    required
                    value="{{ old('name') }}"
                    class="appearance-none block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary focus:border-primarydark sm:text-sm transition duration-150"
                    placeholder="John Doe"
                >
            </div>
        </div>

        <!-- Email -->
        <div>
            <label for="email" class="block text-sm font-medium text-gray-700">
                Email address
            </label>
            <div class="mt-1">
                <input
                    id="email"
                    name="email"
                    type="email"
                    autocomplete="email"
                    required
                    value="{{ old('email') }}"
                    class="appearance-none block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary focus:border-primarydark sm:text-sm transition duration-150"
                    placeholder="name@example.com"
                >
            </div>
        </div>

        <!-- Password -->
        <div>
            <label for="password" class="block text-sm font-medium text-gray-700">
                Password
            </label>
            <div class="mt-1">
                <input
                    id="password"
                    name="password"
                    type="password"
                    autocomplete="new-password"
                    required
                    class="appearance-none block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary focus:border-primarydark sm:text-sm transition duration-150"
                    placeholder="••••••••"
                >
            </div>
        </div>

        <!-- Confirm Password -->
        <div>
            <label for="password_confirmation" class="block text-sm font-medium text-gray-700">
                Confirm password
            </label>
            <div class="mt-1">
                <input
                    id="password_confirmation"
                    name="password_confirmation"
                    type="password"
                    autocomplete="new-password"
                    required
                    class="appearance-none block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary focus:border-primarydark sm:text-sm transition duration-150"
                    placeholder="••••••••"
                >
            </div>
        </div>

        <!-- Submit Button -->
        <div>
            <button
                type="submit"
                class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-sm font-semibold rounded-lg text-white bg-primary hover:bg-primarydark focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary transition duration-150 shadow-md"
            >
                Create account
            </button>
        </div>
    </form>

    <!-- Login link -->
    <div class="text-center text-sm">
        <span class="text-gray-600">Already have an account? </span>
        <a href="/login" class="font-medium text-primary hover:text-primarydark hover:underline transition duration-150">
            Sign in
        </a>
    </div>

</div>

</body>
</html>
