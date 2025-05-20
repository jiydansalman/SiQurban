<!-- resources/views/layouts/admin.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
    <div class="min-h-screen flex">
        <!-- Sidebar -->
        <aside class="w-64 bg-white shadow-md p-5">
            <a href="/dashboard" class="text-4xl font-bold py-4"> SiQurban</a>
            <nav class="space-y-4 pt-4">
                <a href="/dashboard/statistik" class="block py-2 px-4 rounded hover:bg-gray-200">📈 Statistik Penjualan</a>
                <a href="/dashboard/tambah-admin" class="block py-2 px-4 rounded hover:bg-gray-200">➕ Tambah Admin</a>
                <a href="/dashboard/data-user" class="block py-2 px-4 rounded hover:bg-gray-200">👥 Data User</a>
                <a href="/dashboard/tambah-produk" class="block py-2 px-4 rounded hover:bg-gray-200">🛍️ Tambah Produk</a>
                <a href="/dashboard/progres-order" class="block py-2 px-4 rounded hover:bg-gray-200">📦 Progres Order</a>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-8">
            @yield('content')
        </main>
    </div>
</body>

</html>
