<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @vite('resources/css/app.css')
    <title>Customer Management</title>
</head>
<body class="bg-background min-h-screen text-text">

@include('adminpartials.navbar')

<div class="container mx-auto p-6 mt-8 max-w-2xl bg-secondary shadow-md rounded-lg">
    <h1 class="text-3xl font-bold mb-8 text-center text-gray-800">Customer Management</h1>

    <!-- Registration Form -->
    <div class="bg-white p-6 rounded-lg shadow-md mb-8">
        <h2 class="text-2xl font-semibold mb-6 text-gray-800">Register New Customer</h2>
        @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-4 rounded mb-6">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form action="{{ route('users.store') }}" method="POST">
        @csrf

        <!-- Name Field -->
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-text-secondary mb-1">Name</label>
            <input id="name" name="name" type="text" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary" placeholder="Full Name" required>
        </div>

        <!-- Email Field -->
        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-text-secondary mb-1">Email</label>
            <input id="email" name="email" type="email" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary" placeholder="Email Address" required>
        </div>

        <!-- Password Field -->
        <div class="mb-4">
            <label for="password" class="block text-sm font-medium text-text-secondary mb-1">Password</label>
            <input id="password" name="password" type="password" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary" placeholder="Password" required>
        </div>

        <!-- Submit Button -->
        <div class="mt-6">
            <button type="submit" class="w-full bg-primary text-secondary py-3 rounded-lg hover:bg-accent hover:text-primary transition duration-300">
                Register
            </button>
        </div>
    </form>
    </div>

    <!-- Customer List -->
    <div>
        <h2 class="text-2xl font-semibold mb-6 text-gray-800">Customer List</h2>
        <div class="max-h-screen overflow-y-auto">
            <table class="min-w-full bg-white border border-gray-300 shadow-md rounded-lg">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="py-4 px-6 font-semibold text-left text-gray-700">ID</th>
                        <th class="py-4 px-6 font-semibold text-left text-gray-700">Name</th>
                        <th class="py-4 px-6 font-semibold text-left text-gray-700">Email</th>
                        <th class="py-4 px-6 font-semibold text-left text-gray-700">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr class="border-t border-gray-200 hover:bg-gray-100">
                            <td class="py-4 px-6 text-gray-700">{{ $user->id }}</td>
                            <td class="py-4 px-6 text-gray-700">{{ $user->name }}</td>
                            <td class="py-4 px-6 text-gray-700">{{ $user->email }}</td>
                            <td class="py-4 px-6">
                                <a href="{{ route('users.show', $user->id) }}" class="bg-primary text-white px-3 py-1 rounded-md mr-2 hover:bg-blue-600 transition duration-300">View</a>
                                <a href="{{ route('users.edit', $user->id) }}" class="bg-secondary text-white px-3 py-1 rounded-md mr-2 hover:bg-gray-600 transition duration-300">Edit</a>
                                <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-600 text-white px-3 py-1 rounded-md hover:bg-red-700 transition duration-300">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

</body>
</html>
