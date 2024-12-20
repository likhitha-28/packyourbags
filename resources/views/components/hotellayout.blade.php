<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>PackYourBags</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous" />
    <script defer src="https://use.fontawesome.com/releases/v5.5.0/js/all.js" integrity="sha384-GqVMZRt5Gn7tB9D9q7ONtcp4gtHIUEW/yG7h98J7IpE3kpi+srfFyyB/04OV6pG0" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet" />
    <style>
      .image-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
        grid-gap: 10px;
      }
      .image-grid img {
        width: 100%;
        height: auto;
      }
      
    #footerrr {
      position: sticky;
      bottom: 0;
      width: 100%;
      background-color: rgba(0, 0, 0, 0.05); 
      padding: 10px; 
    }

    </style>
    <link rel="stylesheet" href="styles.css"> 
  </head>
  <body>
    <header class="header-bar mb-3" style="background-color: rgba(38, 179, 179, 0.8)">
      <div class="container d-flex flex-column flex-md-row align-items-center p-3">
        <h4 class="my-0 mr-md-auto font-weight-normal"><a href="/hotel" class="text-pink bold" style="color: white">packyourbags</a></h4>
        @auth('hotel')
        <div class="flex-row my-3 my-md-0">
          <form action="/hotel/logout" method="POST" class="d-inline">
            @csrf
            Hello {{ Auth::guard('hotel')->user()->name}}<button class="btn btn-sm btn-primary ">Sign Out</button>
          </form>
        </div>
        @else
        
        <form action="/hotel/login" method="POST" class="mb-0 pt-2 pt-md-0">
          @csrf
          <div class="row align-items-center">
            <div class="col-md mr-0 pr-md-0 mb-3 mb-md-0">
              <input name="loginemail" class="form-control form-control-sm input-dark" type="text" placeholder="email" autocomplete="off" />
            </div>
            <div class="col-md mr-0 pr-md-0 mb-3 mb-md-0">
              <input name="loginpassword" class="form-control form-control-sm input-dark" type="password" placeholder="Password" />
            </div>
            <div class="col-md-auto">
              <button class="btn btn-primary btn-sm">Sign In</button>
            </div>
          </div>
        </form>
        @endauth
          
      </div>
    </header>
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

  {{$slot}}
    <!-- footer begins -->
    <footer class="border-top text-center small text-muted py-3" id="footerrr">
        <p class="m-0">Copyright &copy; {{date('Y')}} <a href="/hotel" class="text-muted">PackYourBags</a>. All rights reserved.</p>
      </footer>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
      <script>
        $('[data-toggle="tooltip"]').tooltip()
      </script>
    </body>
  </html>
  