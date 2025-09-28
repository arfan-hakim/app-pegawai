<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pegawai</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 p-8">

    <div class="container mx-auto">
        <h1 class="text-2xl font-bold mb-6 text-gray-700">Daftar Pegawai</h1>

        <!-- Tombol tambah -->
        <a href="{{ route('employees.create') }}"
            class="mb-4 inline-block bg-blue-600 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-700">
            + Tambah Pegawai
        </a>

        @if($employees->count())
        <table class="w-full border-collapse bg-white shadow-md rounded-lg overflow-hidden">
            <thead class="bg-blue-500 text-white">
                <tr>
                    <th class="px-4 py-2 text-left">Nama Lengkap</th>
                    <th class="px-4 py-2 text-left">Email</th>
                    <th class="px-4 py-2 text-left">Nomor Telepon</th>
                    <th class="px-4 py-2 text-left">Tanggal Lahir</th>
                    <th class="px-4 py-2 text-left">Alamat</th>
                    <th class="px-4 py-2 text-left">Tanggal Masuk</th>
                    <th class="px-4 py-2 text-left">Status</th>
                    <th class="px-4 py-2 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($employees as $employee)
                <tr class="border-b hover:bg-gray-50">
                    <td class="px-4 py-2">{{ $employee->nama_lengkap }}</td>
                    <td class="px-4 py-2">{{ $employee->email }}</td>
                    <td class="px-4 py-2">{{ $employee->nomor_telepon }}</td>
                    <td class="px-4 py-2">{{ $employee->tanggal_lahir }}</td>
                    <td class="px-4 py-2">{{ $employee->alamat }}</td>
                    <td class="px-4 py-2">{{ $employee->tanggal_masuk }}</td>
                    <td class="px-4 py-2">{{ $employee->status }}</td>
                    <td class="px-4 py-2 text-center space-x-2">
                        <a href="{{ route('employees.show', $employee->id) }}"
                            class="text-blue-600 hover:underline">Detail</a>
                        <a href="{{ route('employees.edit', $employee->id) }}"
                            class="text-green-600 hover:underline">Edit</a>
                        <form action="{{ route('employees.destroy', $employee->id) }}"
                            method="POST" class="inline-block"
                            onsubmit="return confirm('Yakin ingin menghapus?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Pagination -->
        <div class="mt-4">
            {{ $employees->links() }}
        </div>

        @else
        <p class="text-gray-600">Tidak ada data pegawai.</p>
        @endif
    </div>
</body>

</html>