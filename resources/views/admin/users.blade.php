<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Pengguna - VeteranMart Admin</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 font-sans">
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <aside class="w-64 bg-emerald-800 text-white p-6">
            <h1 class="text-xl font-bold mb-8">VeteranMart Admin</h1>
            <nav class="space-y-3">
                <a href="{{ route('admin.dashboard') }}" class="block py-2 px-4 rounded hover:bg-emerald-700">Dashboard</a>
                <a href="{{ route('admin.users') }}" class="block py-2 px-4 rounded bg-emerald-700">Kelola Pengguna</a>
            </nav>
        </aside>

        <!-- Konten Utama -->
        <main class="flex-1 p-8">
            <h2 class="text-2xl font-bold text-gray-800 mb-6">Daftar Pengguna UPNVJ Marketplace</h2>
            <div class="bg-white rounded-lg shadow overflow-hidden">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">No</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nama</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Email</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Role</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach($users as $index => $user)
                        <tr>
                            <td class="px-6 py-4 text-sm text-gray-700">{{ $index + 1 }}</td>
                            <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $user->name }}</td>
                            <td class="px-6 py-4 text-sm text-gray-700">{{ $user->email }}</td>
                            <td class="px-6 py-4 text-sm text-gray-700">{{ $user->role ?? 'mahasiswa' }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</body>
</html>