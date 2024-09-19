<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @vite('resources/css/app.css')
    <title>WaveTable Admin Dashboard</title>
</head>
<body class="bg-black text-white min-h-screen flex flex-col items-center justify-center p-4">
        <div class="mb-8">
            <img src="{{ asset('darklogo.png') }}" alt="WaveTable Logo" class=" w-96">
        </div>
    
    <div class="w-full max-w-md">
        <h2 class="text-xl mb-6 text-center">Admin Dashboard</h2>
        
        <div class="space-y-4">
            <a href="/admin/items">
                <button class="w-full py-2 px-4 bg-gray-800 hover:bg-gray-700 rounded transition duration-300">
                    Item Management
                </button>
            </a>

            <a href="/admin/customers">
            <button class="w-full py-2 px-4 bg-gray-800 hover:bg-gray-700 rounded transition duration-300">
                Customer Management
            </button>
            </a>

            <a href="/">
            <button class="w-full py-2 px-4 bg-gray-800 hover:bg-gray-700 rounded transition duration-300">
                Items Page
            </button>
            </a>
            
            <form method="POST" action="{{ route('logout') }}" class="flex items-center">
                    @csrf
                    <button class="w-full py-2 px-4 bg-red-800 hover:bg-red-700 rounded transition duration-300">
                            {{ __('Log Out') }}
                    </button>
            </form>
        </div>
    </div>
</body>
</html>