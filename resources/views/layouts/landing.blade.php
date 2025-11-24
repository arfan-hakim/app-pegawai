<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Admin Kepegawaian</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100 dark:bg-gray-900">

    <!-- NAVBAR LANDING -->
    <nav class="fixed top-0 left-0 w-full backdrop-blur-lg bg-white/30 dark:bg-gray-800/40 border-b border-white/20 shadow-sm z-50">
        <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">
            <div class="text-xl font-bold text-gray-900 dark:text-white">
                Admin Kepegawaian
            </div>
        </div>
    </nav>

    <main class="pt-20">
        @yield('content')
    </main>

</body>

</html>