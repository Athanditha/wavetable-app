<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @vite('resources/css/app.css')
    <title>Edit Customer</title>
</head>
<body class="bg-background min-h-screen">
@include('adminpartials.navbar')

<div class="container mx-auto p-6 mt-8 max-w-2xl bg-secondary shadow-md rounded-lg">
    <h1 class="text-3xl font-bold mb-8 text-center text-gray-800">Edit Customer</h1>
    
    <!-- Update Form -->
    <form action="{{ route('users.update', $user->id) }}" method="POST">
    @csrf
    @method('PUT')
    
    <div class="mb-4">
        <label for="name" class="block text-sm font-medium mb-1 text-text-secondary">Name</label>
        <input id="name" name="name" type="text" value="{{ old('name', $user->name) }}" class="w-full p-3 border border-accent rounded-lg" required>
    </div>
    
    <div class="mb-4">
        <label for="email" class="block text-sm font-medium mb-1 text-text-secondary">Email</label>
        <input id="email" name="email" type="email" value="{{ old('email', $user->email) }}" class="w-full p-3 border border-accent rounded-lg" required>
    </div>
    
    <div class="mb-4">
        <label for="password" class="block text-sm font-medium mb-1 text-text-secondary">Password</label>
        <input id="password" name="password" type="password" class="w-full p-3 border border-accent rounded-lg" placeholder="Leave empty to keep current password">
    </div>
    
    <button type="submit" class="bg-primary text-secondary py-3 px-6 rounded-lg w-full hover:bg-text transition duration-300">Update</button>
</form>

</div>

</body>
</html>
