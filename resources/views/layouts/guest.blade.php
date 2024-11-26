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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
     @vite(['resources/css/home.css', 'resources/js/app.js',]) 
     @vite(['resources/js/sidenav.css', 'resources/js/app.js',])
     <style>

        section {
            padding: 40px;
            cursor: pointer;
            display: flex; justify-content: center; align-items: center;
        }

        body {
            margin: 0;
            display: flex;
            min-height: 100vh;
            flex-direction: column;
        }

        .wrapper {
            flex: 1;
        }

        footer {
            flex-shrink: 0;
        }

     </style> 
</head>
<body style="background-color: rgb(241, 241, 241)">
    <div class="wrapper">
        <main>
            <header>
                @include('layouts.nav')
            </header>
            @if (session('notsuccess'))
            <div class="container container--narrow mt-3">
                <div class="alert alert-primary message-box">
                    {!! session('notsuccess') !!}
                </div>
            </div>
        @endif
        
             {{ $slot }}
             
        </main>
    </div>
    <footer class="bg-gray-800 text-white text-center py-4">
        <p>Copyright &copy; {{date('Y')}} <a href="/">PackYourBags</a>. All rights reserved.</p>
    </footer>
</body>
</html>
