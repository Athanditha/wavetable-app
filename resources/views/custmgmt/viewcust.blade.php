<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @vite('resources/css/app.css')
    <title>View Customer</title>
</head>
<body class="bg-background min-h-screen text-text">

@include('adminpartials.navbar')

<div class="container mx-auto p-6 mt-8 max-w-2xl bg-secondary shadow-md rounded-lg">
    <h1 class="text-3xl font-bold text-center text-gray-800 mb-6">View Customer</h1>

    <div class="bg-white p-6 shadow-md rounded-lg">
        <div class="mb-4">
            <h2 class="text-2xl font-semibold text-gray-800">{{ $user->name }}</h2>
            <p class="text-sm text-gray-600">{{ $user->email }}</p>
        </div>
        <div class="mb-4">
            <p class="text-gray-600"><strong>Username:</strong> {{ $user->user_name ?? 'N/A' }}</p>
            <p class="text-gray-600"><strong>Contact Number:</strong> {{ $user->contact_no ?? 'N/A' }}</p>
        </div>
        <div class="mb-4">
            <p class="text-gray-600"><strong>Created At:</strong> {{ $user->created_at->format('F j, Y, g:i a') }}</p>
            <p class="text-gray-600"><strong>Updated At:</strong> {{ $user->updated_at->format('F j, Y, g:i a') }}</p>
        </div>
        <div class="text-center">
            <a href="{{ route('users.index') }}" class="text-primary hover:underline">Back to Customer List</a>
        </div>
    </div>
</div>

</body>
</html>
