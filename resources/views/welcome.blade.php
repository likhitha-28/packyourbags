@extends('layouts.home')
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles.css">
  <title>PackYourBags</title>
</head>
<body>

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
                      <a href="{{ route('login') }}">Log in</a>

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
      

      <div class="card-container">
        <!-- Hotel Card 1 -->
        <div class="card">
          <img src="hotel1.jpg" alt="Hotel 1">
          <h2>Hotel One</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
          <a href="#">Book Now</a>
        </div>
    
        <!-- Hotel Card 2 -->
        <div class="card">
          <img src="hotel2.jpg" alt="Hotel 2">
          <h2>Hotel Two</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
          <a href="#">Book Now</a>
        </div>
    
        <div class="card">
          <img src="hotel2.jpg" alt="Hotel 2">
          <h2>Hotel Two</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
          <a href="#">Book Now</a>
        </div>
    
        <div class="card">
          <img src="hotel2.jpg" alt="Hotel 2">
          <h2>Hotel Two</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
          <a href="#">Book Now</a>
        </div>
    
        <div class="card">
          <img src="hotel2.jpg" alt="Hotel 2">
          <h2>Hotel Two</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
          <a href="#">Book Now</a>
        </div>
    
        <div class="card">
          <img src="hotel2.jpg" alt="Hotel 2">
          <h2>Hotel Two</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
          <a href="#">Book Now</a>
        </div>
        <!-- Add more hotel cards as needed -->
      </div>
    

    </section>
  </header>
  <section class="parallax-section">
    <!-- Your page content goes here -->
    <h1>contents</h1>
  </section>
</body>
</html>



