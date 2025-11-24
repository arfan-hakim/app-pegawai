<!DOCTYPE html>
<html lang="en" x-data="{ darkMode: localStorage.theme === 'dark' }" x-init="
    if (darkMode) document.documentElement.classList.add('dark');
    else document.documentElement.classList.remove('dark');
" :class="{ 'dark': darkMode }">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Kepegawaian')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <script>
        tailwind.config = {
            darkMode: 'class', // penting agar bisa di-toggle pakai class "dark"
            theme: {
                extend: {
                    colors: {
                        primary: '#065f46', // hijau gelap khas rumah sakit
                    },
                },
            },
        }
    </script>

    <style>
        body {
            background-image: url("{{ asset('images/bg-rumah-sakit.jpg') }}");
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }

        .overlay {
            background-color: rgba(0, 60, 50, 0.85);
        }
    </style>
</head>

<body class="flex flex-col min-h-screen text-gray-100 font-sans transition-colors duration-500 bg-gray-100 dark:bg-gray-900">

    <!-- Navbar -->
    <header class="overlay shadow-md">
        <div class="container mx-auto flex justify-between items-center px-8 py-4">
            <a href="{{ route('admin.welcome') }}"
                class="text-2xl font-bold hover:text-emerald-300 transition">
                Admin Kepegawaian
            </a>

            <nav class="flex items-center space-x-6">
                <ul class="flex space-x-6">
                    <li><a href="{{ url('/employees') }}" class="hover:text-green-400 transition">Pegawai</a></li>
                    <li><a href="{{ url('/departements') }}" class="hover:text-green-400 transition">Departemen</a></li>
                    <li><a href="{{ url('/attendances') }}" class="hover:text-green-400 transition">Kehadiran</a></li>
                    <li><a href="{{ url('/positions') }}" class="hover:text-green-400 transition">Jabatan</a></li>
                    <li><a href="{{ url('/salaries') }}" class="hover:text-green-400 transition">Gaji</a></li>
                    <li><a href="{{ url('/koperasis') }}" class="hover:text-green-400 transition">Koperasi</a></li>
                </ul>

                <a href="{{ route('admin.logout') }}"
                    class="px-4 py-2 bg-red-600 hover:bg-red-700 rounded-lg">
                    Logout
                </a>

                <!-- Tombol Toggle Mode -->
                <button
                    @click="
        darkMode = !darkMode;
        localStorage.theme = darkMode ? 'dark' : 'light';
        document.documentElement.classList.toggle('dark', darkMode);
    "
                    class="ml-4 p-2 rounded-lg border border-green-400 text-green-300 hover:bg-green-600 hover:text-white transition">
                    <span x-show="!darkMode">🌙</span>
                    <span x-show="darkMode">☀️</span>
                </button>

            </nav>
        </div>
    </header>

    <!-- Konten Utama -->
    <main class="flex-grow container mx-auto px-6 py-10">
        <div
            class="bg-white/90 dark:bg-gray-800/90 backdrop-blur-lg shadow-2xl rounded-2xl p-8 transition duration-500">
            <h2 class="text-3xl font-semibold text-green-800 dark:text-green-300 mb-6 border-b border-green-300 dark:border-green-700 pb-3">
                @yield('page-title')
            </h2>
            <div class="text-gray-800 dark:text-gray-200 transition duration-500">
                @yield('content')
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="overlay text-center py-4 mt-auto dark:bg-gray-950">
        <p class="text-gray-200 text-sm">
            &copy; {{ date('Y') }} <span class="text-green-400 font-semibold">Sistem Manajemen Kepegawaian.</span> Semua hak dilindungi.
        </p>
    </footer>

</body>

</html>