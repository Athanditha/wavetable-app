<!-- resources/views/home.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WaveTable | Home</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @vite('resources/css/app.css')
</head>
<body class="bg-secondary text-primary font-sans">
    <!-- Include Navbar -->
    @include('customerpartials.navbarrep')
    <!-- Featured Items Section -->
    <section class="py-16 bg-background">
        <div class="container mx-auto text-center">
            <h2 class="text-3xl font-heading font-bold mb-8 text-text-secondary mt-2">Featured Items</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Loop through items and display them-->
                @foreach($items as $item)
                    <div class="bg-card p-4 shadow-soft rounded-lg">
                        <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->name }}" class="w-50 h-50 object-cover rounded-md mb-4">
                        <h3 class="text-xl font-semibold text-primary">{{ $item->name }}</h3>
                        <p class="text-text-secondary mt-2">{{ $item->description }}</p>
                        <p class="text-primary font-bold mt-4">${{ $item->sale_price }}</p>
                        <p class="text-primary font-bold mt-4">${{ $item->rental_rate}}</p>
                        <a href="#" class="bg-primary text-secondary px-4 py-2 rounded-full font-semibold hover:bg-secondary hover:text-primary mt-4 inline-block">Add to Cart</a>
                        <a href="#" class="bg-primary text-secondary px-4 py-2 rounded-full font-semibold hover:bg-secondary hover:text-primary mt-4 inline-block">Add to WishList</a>

                    </div>
                @endforeach  
            </div>
        </div>
    </section>

    <!-- Include Footer -->
    @include('customerpartials.footer')

</body>
</html>
