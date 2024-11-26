<!DOCTYPE html>
<html>
<head>
    <title>Availability Calendar</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
     @vite(['resources/css/home.css', 'resources/js/app.js'])
     <!-- FullCalendar CSS -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/5.10.0/main.min.css" rel="stylesheet">
    <link href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css' rel='stylesheet' />
    <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js'></script>
    <script>
        $(document).ready(function() {
            $('#calendar').fullCalendar({
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,basicWeek,basicDay'
                },
                editable: false,
                eventLimit: true, // allow "more" link when too many events
                events: [
                    @foreach($availabilityData as $availability)
                    {
                        title: '{{ $availability["title"] }}',
                        start: '{{ $availability["start"] }}',
                        color: '{{ $availability["color"] }}'
                    },
                    @endforeach
                ]
            });
        });
    </script>
</head>
<body>
    <header>
        @include('layouts.nav')
    </header>
    <button class="btn btn-primary" onclick="goBack()" style="justify-self: end; width:3cm; margin-left:2cm;">Go back</button>
    <div class="container" style="margin: 2cm;">
        <div id='calendar'></div>
    </div>

    <script>
        function goBack() {
            window.history.back();
        }
    </script>
</body>

</html>

