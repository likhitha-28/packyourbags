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
     <!-- FullCalendar CSS -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/5.10.0/main.min.css" rel="stylesheet">

     <style>
        body {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
          }

          footer {
            margin-top: auto;
          }
    

          .dropdown-menu {
              width: 5cm; 
              height: 5cm; 
              overflow: auto; 
          }
          #calendar {
              width: 100%;
              height: 100%;
          }
          .review-form {
              max-width: 500px;
              padding: 1cm;
          }

          .form-group {
              margin-bottom: 20px;
          }

          .form-control {
              width: 100%;
              padding: 10px;
              border: 1px solid #ced4da;
              border-radius: 4px;
          }

          .btn-primary {
              background-color: #007bff;
              color: #fff;
              border: none;
              padding: 10px 20px;
              border-radius: 4px;
              cursor: pointer;
          }

          .btn-primary:hover {
              background-color: #0056b3;
          }

     </style>
  <meta charset='utf-8' />
  <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js'></script>
  <script>

    document.addEventListener('DOMContentLoaded', function() {
      var calendarEl = document.getElementById('calendar');
      var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth'
      });
      calendar.render();
    });

  </script>
  
</head>

<body style="background-color: rgb(241, 241, 241)">
    <main>
    <header>
        @include('layouts.nav')
        <section class="parallax-section" style="color:black">
            <div class="search-container">
              <form id="liveSearchForm" class="search-form form-group" action="/search-result">
                <input type="text" id="search" placeholder="Search" name="query" value="{{ session('query') }}">
                <input type="date" placeholder="From Date" name="from" value="{{ session('from') }}">
                <input type="date" placeholder="To Date" name="to" value="{{ session('to') }}">
                <input type="number" placeholder="Number of People" name="people" value="{{ session('people') }}">
                  <button type="submit">Search</button>
                  <div id="searchResultsContainer"></div>
              </form>
          </div>
          @if (session('error'))
              <div class="container container--narrow mt-3">
                  <div class="alert alert-primary message-box">
                      {!! session('error') !!}
                  </div>
              </div>
          @endif
          @if (session('success'))
              <div class="container container--narrow mt-3">
                  <div class="alert alert-primary message-box">
                      {!! session('success') !!}
                  </div>
              </div>
          @endif
          @if (session('notsuccess'))
              <div class="container container--narrow mt-3">
                  <div class="alert alert-primary message-box">
                      {!! session('notsuccess') !!}
                  </div>
              </div>
          @endif
          
    </header>
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
    <footer class="bg-gray-800 text-white text-center py-4">
        <p>Copyright &copy; {{date('Y')}} <a href="/">PackYourBags</a>. All rights reserved.</p>
    </footer>
    @include('layouts.scripts')
  </body>
  </html>
  

