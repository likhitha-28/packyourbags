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
     @vite([ 'resources/css/joinus.css'])
     @vite(['resources/css/home.css']) 
     @vite(['resources/js/sidenav.css']) 

</head>

<body>
  <header class="parallax-navbar">
    @include('layouts.nav')
    
        <section class="parallax-section">
          <h1 class="custom-heading">Thank you for considering us</h1>
          <p class="custom-paragraph">oin us information herejoin us information herejoin us information herejoin us information herejoin us information herejoin us information herejoin us information herejoin us information herejoin us information herejoin us information herejoin us information herejoin us information herejoin us information herejoin us information herejoin us information here</p>
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

    {{$slot}}
  
    <footer class="bg-gray-800 text-white text-center py-4">
      &copy; 2024 <a href="/">PackYourBags</a>. All rights reserved.
  </footer>
</body>
</html>
