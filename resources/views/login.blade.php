<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Iin's Bouquet</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body{
            font-family: 'Poppins', sans-serif;
        }

        .gradient-btn{
            background: linear-gradient(135deg,#6C63FF,#FF6FA9);
        }

        .gradient-btn:hover{
            opacity: .9;
        }
    </style>
</head>
<body class="bg-slate-100 min-h-screen flex items-center justify-center">

    <div class="w-full max-w-md">

        <!-- Logo -->
        <div class="text-center mb-6">

            <div class="text-6xl mb-3">
                🌷
            </div>

            <h1 class="text-4xl font-bold text-pink-500">
                Iin's Bouquet
            </h1>

            <p class="text-gray-500 text-sm mt-2">
                Fresh Flowers • Beautiful Moments • Made With Love
            </p>

        </div>

        <!-- Login Card -->
        <div class="bg-white rounded-3xl shadow-lg p-8">

            <h2 class="text-2xl font-bold text-center mb-6">
                Login Admin
            </h2>

            <!-- Error -->
            @if($errors->any())
                <div class="bg-red-100 border border-red-300 text-red-700 px-4 py-3 rounded-lg mb-4">
                    {{ $errors->first() }}
                </div>
            @endif

            <form action="{{ route('login.process') }}" method="POST">

                @csrf

                <!-- Email -->
                <div class="mb-4">

                    <label class="block text-gray-700 mb-2">
                        Email
                    </label>

                    <input
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        placeholder="Masukkan Email"
                        class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-pink-400">

                </div>

                <!-- Password -->
                <div class="mb-6">

                    <label class="block text-gray-700 mb-2">
                        Password
                    </label>

                    <input
                        type="password"
                        name="password"
                        placeholder="Masukkan Password"
                        class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-pink-400">

                </div>

                <!-- Button Login -->
                <button
                    type="submit"
                    class="w-full text-white py-3 rounded-xl font-semibold gradient-btn shadow-lg">

                    Login

                </button>

            </form>

        </div>

        <p class="text-center text-gray-500 text-sm mt-4">
            © {{ date('Y') }} Iin's Bouquet
        </p>

    </div>

</body>
</html>