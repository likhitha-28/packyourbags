<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PackYourBags</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
     @vite(['resources/css/home.css', 'resources/js/app.js'])
     

</head>
{{-- <body>
    <header class="parallax-navbar">
        <nav class="navbar">
          <div class="container">
            <div class="logo">
              <img src="https://www.pokemon.co.jp/ex/sun_moon/common/images/pokemon/160901_02/portrait01.png" alt="Logo">
            </div>
            <div class="nav-links">
              <a href="#">Home</a>
              <a href="#">About</a>
              <a href="#">Services</a>
              <a href="#">Join Us</a>
              @if (Route::has('login'))
                  @auth
                      <a href="{{ url('/dashboard') }}">Dashboard</a>
                      @else
                          <a href="{{ route('login') }}">Log innnnnnnnnn</a>
    
                      @if (Route::has('register'))
                      <a href="{{ route('register') }}">Register</a>
                      @endif
                  @endauth
              @endif
              <a href="{{ url('/admin')}}">go admin page</a>
              <div class="relative ml-3 justify-items-end">
                <button type="button" class="relative flex rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                  <span class="absolute -inset-1.5"></span>
                  <span class="sr-only">Open user menu</span>
                  <img class="h-8 w-8 rounded-full" src="https://www.shutterstock.com/image-vector/kudus-indonesia-february-19-2024-260nw-2426973581.jpg" alt="">
                </button>
              </div>
            </div>
          </div>
        </nav>
        <section class="parallax-section">
          <div class="search-container">
            <form class="search-form form-group">
              <input type="text" id="search" placeholder="Search">
              <input type="date" placeholder="From Date">
              <input type="date" placeholder="To Date">
              <input type="number" placeholder="Number of People">
              <button type="submit">Search</button>
            </form>
          </div>
    
      </header>






    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
</body> --}}
</html>