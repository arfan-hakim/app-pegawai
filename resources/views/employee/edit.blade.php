<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Pegawai</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 p-8">
    <div class="container mx-auto max-w-2xl bg-white shadow-md rounded-lg p-6">
        <h2 class="text-2xl font-bold mb-6 text-gray-700">Edit Data Pegawai</h2>

        <form action="{{ route('employees.update', $employee->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <!-- Nama Lengkap -->
            <div>
                <label class="block text-gray-700">Nama Lengkap</label>
                <input type="text" name="nama_lengkap"
                    value="{{ old('nama_lengkap', $employee->nama_lengkap) }}"
                    class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring focus:ring-blue-300">
            </div>

            <!-- Email -->
            <div>
                <label class="block text-gray-700">Email</label>
                <input type="email" name="email"
                    value="{{ old('email', $employee->email) }}"
                    class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring focus:ring-blue-300">
            </div>

            <!-- Nomor Telepon -->
            <div>
                <label class="block text-gray-700">Nomor Telepon</label>
                <input type="text" name="nomor_telepon"
                    value="{{ old('nomor_telepon', $employee->nomor_telepon) }}"
                    class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring focus:ring-blue-300">
            </div>

            <!-- Tanggal Lahir -->
            <div>
                <label class="block text-gray-700">Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir"
                    value="{{ old('tanggal_lahir', $employee->tanggal_lahir) }}"
                    class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring focus:ring-blue-300">
            </div>

            <!-- Alamat -->
            <div>
                <label class="block text-gray-700">Alamat</label>
                <input type="text" name="alamat"
                    value="{{ old('alamat', $employee->alamat) }}"
                    class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring focus:ring-blue-300">
            </div>

            <!-- Tanggal Masuk -->
            <div>
                <label class="block text-gray-700">Tanggal Masuk</label>
                <input type="date" name="tanggal_masuk"
                    value="{{ old('tanggal_masuk', $employee->tanggal_masuk) }}"
                    class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring focus:ring-blue-300">
            </div>

            <!-- Status -->
            <div>
                <label class="block text-gray-700">Status</label>
                <select name="status"
                    class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring focus:ring-blue-300">
                    <option value="aktif" {{ old('status', $employee->status) == 'aktif' ? 'selected' : '' }}>Aktif</option>
                    <option value="tidak aktif" {{ old('status', $employee->status) == 'tidak aktif' ? 'selected' : '' }}>Tidak Aktif</option>
                </select>
            </div>

            <!-- Tombol -->
            <div class="flex justify-between">
                <a href="{{ route('employees.index') }}"
                    class="bg-gray-500 text-white px-4 py-2 rounded-lg shadow hover:bg-gray-600">
                    Batal
                </a>
                <button type="submit"
                    class="bg-blue-600 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-700">
                    Update
                </button>
            </div>
        </form>
    </div>
</body>

</html>