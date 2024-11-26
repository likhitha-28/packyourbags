<nav class="navbar">
    <div class="container">
      <div class="logo">
        <img src="https://www.pokemon.co.jp/ex/sun_moon/common/images/pokemon/160901_02/portrait01.png" alt="Logo">
      </div>
      <div class="nav-links">
        {{-- <a href="{{ ('/stripe') }}">Stripe test</a> --}}
        <a href={{'/'}}>Home</a>
        <a href="{{ ('/about-us') }}">About</a>
        <a href="#">Services</a>
        <a href="{{ ('/hotel-application') }}">Join Us</a>
        <a href="{{ url('/admin')}}">go admin page</a>
        <a href="{{ url('/hotel')}}">hotellog</a>
        @if (Route::has('login'))
            @auth
                {{-- dropdown--}}
              <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                      <div class="relative ml-3 justify-items-end">
                        <button type="button" class="relative flex rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                          <span class="absolute -inset-1.5"></span>
                          <span class="sr-only">Open user menu</span>
                          <img class="h-8 w-8 rounded-full" src="https://www.shutterstock.com/image-vector/kudus-indonesia-february-19-2024-260nw-2426973581.jpg" alt="">
                        </button>
                      </div>
                    </x-slot>

              <x-slot name="content">
                  <x-dropdown-link :href="route('profile.edit')">
                    <div>{{ Auth::user()->name }}'s Profile</div>

                  </x-dropdown-link>
                  {{--Reservations & plans--}}
                  <x-dropdown-link :href="route('my-bookings')">
                    your Bookings
                  </x-dropdown-link>
                    </form>
                  {{--reviews--}}
                  <x-dropdown-link :href="route('my-reviews')">
                    your Reviews
                  </x-dropdown-link>
                  <!-- Authentication -->
                  <form method="POST" action="{{ route('logout') }}">
                      @csrf

                      <x-dropdown-link :href="route('logout')"
                              onclick="event.preventDefault();
                                          this.closest('form').submit();">
                          {{ __('Log Out') }}
                      </x-dropdown-link>
                  </form>
              </x-slot>
          </x-dropdown>
      </div>
                @else
                    <a href="{{ route('login') }}">Log in</a>

                @if (Route::has('register'))
                <a href="{{ route('register') }}">Register</a>
                @endif
            @endauth
        @endif
        
      </div>
    </div>
  </nav>