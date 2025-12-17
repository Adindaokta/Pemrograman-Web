<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - TripPlay</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gray-100 font-sans antialiased">

    <div class="flex h-screen overflow-hidden">
        <aside class="w-64 bg-gray-900 text-white flex flex-col fixed h-full">
            <div class="h-16 flex items-center justify-center border-b border-gray-800">
                <h1 class="text-2xl font-bold text-green-400">ADMIN PANEL</h1>
            </div>
            <nav class="flex-1 px-2 py-4 space-y-2">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center px-4 py-3 rounded-lg hover:bg-gray-800 {{ request()->routeIs('admin.dashboard') ? 'bg-gray-800 text-green-400' : '' }}">
                    <i class="fas fa-home w-6"></i> Dashboard
                </a>
                <a href="{{ route('admin.destinations') }}" class="flex items-center px-4 py-3 rounded-lg hover:bg-gray-800 {{ request()->routeIs('admin.destinations*') ? 'bg-gray-800 text-green-400' : '' }}">
                    <i class="fas fa-map w-6"></i> Kelola Destinasi
                </a>
                <a href="{{ route('admin.users') }}" class="flex items-center px-4 py-3 rounded-lg hover:bg-gray-800 {{ request()->routeIs('admin.users*') ? 'bg-gray-800 text-green-400' : '' }}">
                    <i class="fas fa-users w-6"></i> Kelola User
                </a>
                <a href="/" target="_blank" class="flex items-center px-4 py-3 rounded-lg hover:bg-gray-800 text-gray-400">
                    <i class="fas fa-external-link-alt w-6"></i> Lihat Website
                </a>
            </nav>
            <div class="p-4 border-t border-gray-800">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full flex items-center px-4 py-2 text-red-400 hover:bg-red-900/20 rounded-lg transition">
                        <i class="fas fa-sign-out-alt w-6"></i> Logout
                    </button>
                </form>
            </div>
        </aside>

        <div class="flex-1 flex flex-col ml-64">
            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100 p-6">
                @yield('content')
            </main>
        </div>
    </div>

</body>
</html>