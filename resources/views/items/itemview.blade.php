<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @vite('resources/css/app.css')
    <title>WaveTable | Item Management</title>
</head>
<body class="bg-background text-text p-0 font-sans">

@include('adminpartials.navbar')

<div class="container mx-auto p-4">

    <h1 class="text-4xl font-bold text-center text-text mb-10">Inventory Management</h1>

    <div class="flex flex-wrap -mx-2">
        <!-- Add Section -->
        <div class="w-full lg:w-1/2 px-2 mb-6 lg:mb-0">
            <div class="p-6 bg-card shadow-soft rounded-xl">
                <h2 class="text-2xl font-semibold mb-6 text-text-secondary">Add Equipment</h2>
                <form action="{{ route('items.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4">
                        <label for="brand" class="block text-sm font-medium mb-1 text-text-secondary">Brand</label>
                        <input id="brand" name="brand" type="text" class="w-full p-3 border border-accent rounded-lg focus:outline-none focus:ring-2 focus:ring-primary" placeholder="Brand" required>
                    </div>
                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium mb-1 text-text-secondary">Name</label>
                        <input id="name" name="name" type="text" class="w-full p-3 border border-accent rounded-lg focus:outline-none focus:ring-2 focus:ring-primary" placeholder="Name" required>
                    </div>
                    <div class="mb-4">
                        <label for="category" class="block text-sm font-medium mb-1 text-text-secondary">Category</label>
                        <input id="category" name="category" type="text" class="w-full p-3 border border-accent rounded-lg focus:outline-none focus:ring-2 focus:ring-primary" placeholder="Category" required>
                    </div>
                    <div class="mb-4">
                        <label for="description" class="block text-sm font-medium mb-1 text-text-secondary">Description</label>
                        <textarea id="description" name="description" class="w-full p-3 border border-accent rounded-lg focus:outline-none focus:ring-2 focus:ring-primary" placeholder="Description"></textarea>
                    </div>
                    <div class="mb-4">
                        <label for="quantity" class="block text-sm font-medium mb-1 text-text-secondary">Quantity</label>
                        <input id="quantity" name="quantity" type="number" class="w-full p-3 border border-accent rounded-lg focus:outline-none focus:ring-2 focus:ring-primary" placeholder="Quantity" required>
                    </div>
                    <div class="mb-4">
                        <label for="sale_price" class="block text-sm font-medium mb-1 text-text-secondary">Sale Price</label>
                        <input id="sale_price" name="sale_price" type="number" step="0.01" class="w-full p-3 border border-accent rounded-lg focus:outline-none focus:ring-2 focus:ring-primary" placeholder="Sale Price" required>
                    </div>
                    <div class="mb-6">
                        <label for="rental_rate" class="block text-sm font-medium mb-1 text-text-secondary">Rental Rate (Monthly)</label>
                        <input id="rental_rate" name="rental_rate" type="number" step="0.01" class="w-full p-3 border border-accent rounded-lg focus:outline-none focus:ring-2 focus:ring-primary" placeholder="Rental Rate" required>
                    </div>
                    <div class="mb-4">
                        <label for="image" class="block text-sm font-medium mb-1 text-text-secondary">Image</label>
                        <input id="image" name="image" type="file" class="w-full p-3 border border-accent rounded-lg">
                    </div>
                    <button type="submit" class="bg-primary text-secondary py-3 px-6 rounded-lg w-full hover:bg-text transition duration-300">Add Equipment</button>
                </form>
            </div>
        </div>

        <!-- Equipment Table -->
        <div class="w-full lg:w-1/2 px-2">
            <h2 class="text-3xl font-semibold mb-6 text-text">Equipment</h2>
            <div class="max-h overflow-y-auto">
                <table class="min-w-full bg-card border-primary border shadow-soft">
                    <thead>
                        <tr class="bg-background">
                            <th class="py-4 px-6 font-semibold text-left text-text">ID</th>
                            <th class="py-4 px-6 font-semibold text-left text-text">Brand</th>
                            <th class="py-4 px-6 font-semibold text-left text-text">Name</th>
                            <th class="py-4 px-6 font-semibold text-left text-text">Quantity</th>
                            <th class="py-4 px-6 font-semibold text-left text-text">Price</th>
                            <th class="py-4 px-6 font-semibold text-left text-text">Rental Price</th>
                            <th class="py-4 px-6 font-semibold text-left text-text">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $item)
                            <tr class="border-t border-gray-200 hover:bg-hover-link transition duration-150">
                                <td class="py-4 px-6 text-text-secondary">{{ $item->id }}</td>
                                <td class="py-4 px-6 text-text-secondary">{{ $item->brand }}</td>
                                <td class="py-4 px-6 text-text-secondary">{{ $item->name }}</td>
                                <td class="py-4 px-6 text-text-secondary">{{ $item->quantity }}</td>
                                <td class="py-4 px-6 text-text-secondary">${{ number_format($item->sale_price, 2) }}</td>
                                <td class="py-4 px-6 text-text-secondary">${{ number_format($item->rental_rate, 2) }}</td>
                                <td class="py-4 px-6">
                                    <a href="{{ route('items.show', $item->id) }}" class="bg-primary text-white px-3 py-1 rounded-md mr-2 hover:bg-text transition duration-300">View</a>
                                    <a href="{{ route('items.edit', $item->id) }}" class="bg-text-secondary text-white px-3 py-1 rounded-md mr-2 hover:bg-hover-link transition duration-300">Edit</a>
                                    <form action="{{ route('items.destroy', $item->id) }}" method="POST" class="inline delete-item-form">
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
</div>

</body>
</html>
