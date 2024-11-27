<div class="header-container rounded p-3 mb-3 bg-dark">
    @if (Route::has('login'))
        <div class="d-flex justify-content-end">
            @auth
                <a href="{{ url('/dashboard') }}" class="btn btn-primary text-decoration-none text-white me-2">
                    Dashboard
                </a>
                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-primary text-decoration-none text-white">
                        Logout
                    </button>
                </form>
            @else
                <a href="{{ route('login') }}" class="btn btn-primary text-decoration-none text-white me-2">
                    Login
                </a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="btn btn-primary text-decoration-none text-white">
                        Register
                    </a>
                @endif
            @endauth
        </div>
    @endif
</div>