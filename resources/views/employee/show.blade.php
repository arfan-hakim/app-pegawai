<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pegawai</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 p-8">

    <div class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold mb-6 text-gray-700">Detail Pegawai</h1>

        <table class="w-full border border-gray-300 rounded-lg overflow-hidden">
            <tr class="border-b">
                <th class="px-4 py-2 text-left bg-gray-100">Nama Lengkap</th>
                <td class="px-4 py-2">{{ $employee->nama_lengkap }}</td>
            </tr>
            <tr class="border-b">
                <th class="px-4 py-2 text-left bg-gray-100">Email</th>
                <td class="px-4 py-2">{{ $employee->email }}</td>
            </tr>
            <tr class="border-b">
                <th class="px-4 py-2 text-left bg-gray-100">Nomor Telepon</th>
                <td class="px-4 py-2">{{ $employee->nomor_telepon }}</td>
            </tr>
            <tr class="border-b">
                <th class="px-4 py-2 text-left bg-gray-100">Tanggal Lahir</th>
                <td class="px-4 py-2">{{ $employee->tanggal_lahir }}</td>
            </tr>
            <tr class="border-b">
                <th class="px-4 py-2 text-left bg-gray-100">Alamat</th>
                <td class="px-4 py-2">{{ $employee->alamat }}</td>
            </tr>
            <tr class="border-b">
                <th class="px-4 py-2 text-left bg-gray-100">Tanggal Masuk</th>
                <td class="px-4 py-2">{{ $employee->tanggal_masuk }}</td>
            </tr>
            <tr>
                <th class="px-4 py-2 text-left bg-gray-100">Status</th>
                <td class="px-4 py-2">{{ $employee->status }}</td>
            </tr>
        </table>

        <div class="mt-4">
            <a href="{{ route('employees.index') }}"
                class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">Kembali</a>
        </div>
    </div>

</body>

</html>