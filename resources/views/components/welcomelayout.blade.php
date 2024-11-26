<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>PackYourBags</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
     @vite(['resources/css/home.css']) 
     @vite(['resources/js/sidenav.css']) 
     <style>
          .card-content {
            display: flex;
            flex-direction: row;
        }
        
        .content-left {
            flex: 1;
        }
        
        .content-right {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>
</head>

<body>
  <header class="parallax-navbar">
    @include('layouts.nav')
    <section class="parallax-section" style="color:black">
      
        <div class="search-container">
          <form id="liveSearchForm" class="search-form form-group" action="/search-result">
              <input type="text" id="search" placeholder="Search"  name="query">
              <input type="date" placeholder="From Date" name="from">
              <input type="date" placeholder="To Date" name="to">
              <input type="number" placeholder="Number of People" name="people">
              <button type="submit">Search</button>
              <div id="searchResultsContainer"></div>
          </form>
      </div>
      @if (session('sorry'))
          <div class="container container--narrow mt-3">
              <div class="alert alert-primary message-box">
                  {!! session('sorry') !!}
              </div>
          </div>
      @endif
    </section>
</header>

    <div class="wrapper">
    <main>
      <div class="sidenav">
        <form id="filterForm" action="/filter-hotels" method="POST"> 
          @csrf
        <div class="form-check">
          <input name="pool" class="form-check-input" type="checkbox" value="1" id="pool" autocomplete="off">
          <label for="pool" class="text-muted mb-1">
              pool
          </label>
        </div>
        <div class="form-check">
          <input name="resto" class="form-check-input" type="checkbox" value="1" id="resto-register" autocomplete="off">
          <label for="resto-register" class="text-muted mb-1">
              restaurant
          </label>
        </div>
        <div class="form-check">
          <input name="breakfast" class="form-check-input" type="checkbox" value="1" id="breakfast-register" >
          <label for="breakfast-register" class="text-muted mb-1">
              breakfast
          </label>
        </div>
        <div class="form-check">
          <input name="cancle" class="form-check-input" type="checkbox" value="1" id="cancle" autocomplete="off">
          <label for="cancle" class="text-muted mb-1">
              cancelation fee
          </label>
        </div>
        <div class="form-group">
          <label for="price-range">Price Range:</label>
          <select name="price-range" id="price-range" class="form-control">
              <option value="">All Prices</option>
              <option value="0-5000">0 - 5000</option>
              <option value="5001-10000">5001 - 10000</option>
              <option value="10001-15000">10001 - 15000</option>
              <option value="15000+">Above 15000</option>
          </select>
        </div>
        <div class="form-group">
          <label for="property-type">Property Type:</label>
          <select name="property-type" id="property-type" class="form-control">
              <option value="">Any</option>
              <option value="hotel">Hotel</option>
              <option value="resort">Resort</option>
              <option value="theme_park"> theme park</option>
              <option value="b&b">B&B</option>
              <option value="motel">motel</option>
          </select>
        </div>
        <button type="submit" class="btn btn-outline-info" id="filterButton">Filter</button>
    
        </form>
    </div>
    
        {{$slot}}
    </main>
    </div>
    <footer class="bg-gray-800 text-white text-center py-4">
      <p>Copyright &copy; {{date('Y')}} <a href="/">PackYourBags</a>. All rights reserved.</p>
  </footer>
@include('layouts.scripts')
  
</body>
</html>


