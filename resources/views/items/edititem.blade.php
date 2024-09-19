<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @vite('resources/css/app.css')
    <title>Admin Dashboard</title>
</head>
<body class="bg-gray-50 min-h-screen">
@include('adminpartials.navbar')

<div class="container mx-auto p-6 mt-8 max-w-2xl bg-white shadow-md rounded-lg">
    <h1 class="text-3xl font-bold mb-8 text-center text-gray-800">Edit Item</h1>
    <form action="{{ route('items.update', $item->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="grid grid-cols-1 gap-6">
            <!-- Brand Field -->
            <div>
                <label for="brand" class="block text-sm font-medium text-gray-700 mb-2">Brand</label>
                <input id="brand" name="brand" value="{{ $item->brand }}" type="text" 
                       class="w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                       required>
            </div>

            <!-- Name Field -->
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Name</label>
                <input id="name" name="name" value="{{ $item->name }}" type="text"
                       class="w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                       placeholder="Name" required>
            </div>

            <!-- Category Field -->
            <div>
                <label for="category" class="block text-sm font-medium text-gray-700 mb-2">Category</label>
                <input id="category" name="category" value="{{ $item->category }}" type="text"
                       class="w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                       placeholder="Category" required>
            </div>

            <!-- Description Field -->
            <div>
                <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                <textarea id="description" name="description" 
                          class="w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                          placeholder="Description" rows="4">{{ $item->description }}</textarea>
            </div>

            <!-- Quantity Field -->
            <div>
                <label for="quantity" class="block text-sm font-medium text-gray-700 mb-2">Quantity</label>
                <input id="quantity" name="quantity" value="{{ $item->quantity }}" type="number"
                       class="w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                       placeholder="Quantity" required>
            </div>

            <!-- Sale Price Field -->
            <div>
                <label for="sale_price" class="block text-sm font-medium text-gray-700 mb-2">Sale Price</label>
                <input id="sale_price" name="sale_price" value="{{ $item->sale_price }}" type="number" step="0.01"
                       class="w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                       placeholder="Sale Price" required>
            </div>

            <!-- Rental Rate Field -->
            <div>
                <label for="rental_rate" class="block text-sm font-medium text-gray-700 mb-2">Rental Rate (Monthly)</label>
                <input id="rental_rate" name="rental_rate" value="{{ $item->rental_rate }}" type="number" step="0.01"
                       class="w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                       placeholder="Rental Rate" required>
            </div>

            <!-- Image Field -->
            <div>
                <label for="image" class="block text-sm font-medium text-gray-700 mb-2">Image</label>
                <input id="image" name="image" type="file"
                       class="w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                
                <!-- Show existing image -->
                @if($item->image)
                    <div class="mt-2">
                        <img src="{{ asset('storage/' . $item->image) }}" alt="Current Image" class="w-32 h-32 object-cover rounded-md">
                    </div>
                @endif
            </div>
        </div>

        <!-- Submit Button -->
        <div class="mt-6">
            <button type="submit"
                    class="w-full bg-blue-600 text-white py-3 rounded-lg hover:bg-blue-700 transition duration-300 shadow-md">
                Submit Changes
            </button>
        </div>
    </form>
</div>

</body>
</html>
