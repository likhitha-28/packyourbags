<header class="parallax-navbar">
    <nav class="navbar">
        <div class="container">
            <div class="logo">
                <img src="https://www.pokemon.co.jp/ex/sun_moon/common/images/pokemon/160901_02/portrait01.png" alt="Logo">
            </div>
            <div class="nav-links">
                <a href={{'/'}}>Home</a>
                <a href="#">About</a>
                <a href="#">Services</a>
                <a href="{{ ('/hotel-application') }}">Join Us</a>
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}">Log in</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                @endif
                <a href="{{ url('/admin')}}">go admin page</a>
                <div class="relative ml-3 justify-items-end">
                    <button type="button"
                        class="relative flex rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800"
                        id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                        <span class="absolute -inset-1.5"></span>
                        <span class="sr-only">Open user menu</span>
                    </button>
                </div>
            </div>
        </div>
    </nav>
    <section class="parallax-section">
        <h1 class="custom-heading">Thank you for considering us</h1>
        <p class="custom-paragraph">Join us information herejoin us information herejoin us information herejoin us
            information herejoin us information herejoin us information herejoin us information herejoin us information
            herejoin us information herejoin us information herejoin us information herejoin us information herejoin us
            information herejoin us information herejoin us information here</p>
        <a href="#form">click here to mail us</a>
    </section>
    @if (session('success'))
        <div class="container container--narrow mt-3">
            <div class="alert alert-primary text-center">
                {{session('success')}}
            </div>
        </div>
    @endif
    @if (session('fail'))
        <div class="container container--narrow mt-3">
            <div class="alert alert-danger text-center">
                {{session('fail')}}
            </div>
        </div>
    @endif
</header>
