<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @vite('resources/css/app.css')
    <title>View Item</title>
</head>
<body class="bg-gray-50 p-0">

@include('adminpartials.navbar')

<div class="container mx-auto p-4 roboto-font">
    <h1 class="text-4xl font-bold text-center text-gray-800 mb-6">View Item</h1>
    
    <div class="max-w-2xl mx-auto bg-white p-6 shadow-md rounded-lg">
        <div class="mb-4">
            <h2 class="text-2xl font-semibold text-gray-700">{{ $item->name }}</h2>
            <p class="text-sm text-gray-500">{{ $item->category }}</p>
        </div>
        <div class="mb-4">
            <img src="{{ $item->image ? asset('storage/' . $item->image) : 'https://via.placeholder.com/150' }}" alt="{{ $item->name }}" class="w-full h-auto rounded-md mb-4">
        </div>
        <div class="mb-4">
            <p class="text-gray-700"><strong>Brand:</strong> {{ $item->brand }}</p>
            <p class="text-gray-700"><strong>Description:</strong> {{ $item->description }}</p>
            <p class="text-gray-700"><strong>Quantity:</strong> {{ $item->quantity }}</p>
            <p class="text-gray-700"><strong>Sale Price:</strong> ${{ number_format($item->sale_price, 2) }}</p>
            <p class="text-gray-700"><strong>Rental Rate:</strong> ${{ number_format($item->rental_rate, 2) }} per month</p>
        </div>
        <a href="{{ route('items.index') }}" class="text-blue-500 hover:underline">Back to Items Menu</a>
    </div>
</div>

</body>
</html>
