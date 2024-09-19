<nav class="bg-primary text-secondary p-4 shadow-hard">
    <div class="container mx-auto flex justify-between items-center">
        <!-- Brand Name -->
        <div class="flex items-center flex-shrink-0 text-white mr-6">
            <a href="/" class="flex items-center">
                <img src="{{ asset('darklogo.png') }}" alt="Logo" class="h-20 p-0 w-auto">
            </a>
        </div>
        
        <!-- Action Buttons -->
        <div class="flex items-center">
            @if(Auth::check())
                <!-- User Info and Logout Button -->
                <div class="flex items-center space-x-4">
                    <span class="text-white">{{ Auth::user()->name }}</span>
                    <form method="POST" action="{{ route('logout') }}" class="flex items-center">
                        @csrf
                        <button class="bg-darkblue text-white px-4 py-2 rounded-md focus:outline-none hover:bg-darkblue-dark" type="submit">
                            {{ __('Log Out') }}
                        </button>
                    </form>
                </div>
            @else
                <!-- Login and Register Buttons -->
                <div class="flex space-x-4">
                    <a class="btn btn-success px-4 py-2 rounded-md" href="{{ url('login') }}">Login</a>
                    <a class="btn btn-primary px-4 py-2 rounded-md" href="{{ url('register') }}">Register</a>
                </div>
            @endif
        </div>
    </div>
</nav>
