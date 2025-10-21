<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'App Pegawai')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 text-gray-800">

    <!-- Navbar -->
    <header class="bg-blue-600 text-white shadow">
        <div class="container mx-auto flex justify-between items-center px-6 py-4">
            <h1 class="text-xl font-bold">@yield('page-title', 'App Pegawai')</h1>
            <nav>
                <ul class="flex space-x-6">
                    <li><a href="{{ url('/employees') }}" class="hover:underline">Employee</a></li>
                    <li><a href="{{ url('/departements') }}" class="hover:underline">Department</a></li>
                    <li><a href="{{ url('/attendances') }}" class="hover:underline">Attendance</a></li>
                    <li><a href="{{ url('/positions') }}" class="hover:underline">Position</a></li>
                    <li><a href="{{ url('/salaries') }}" class="hover:underline">Salary</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Konten -->
    <main class="container mx-auto px-6 py-8">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-gray-300 text-center py-4 mt-8">
        <p>&copy; {{ date('Y') }} App Pegawai</p>
    </footer>

</body>

</html>