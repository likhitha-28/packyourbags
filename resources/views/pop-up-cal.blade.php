<!DOCTYPE html>
<html>
<head>
    <title>Availability Calendar</title>
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
                ],
                eventClick: function(calEvent, jsEvent, view) {
                    $('#event-title').html(calEvent.title);
                    $('#event-modal').modal();
                }
            });
        });
    </script>
    
    <style>
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0,0,0);
            background-color: rgba(0,0,0,0.4);
            padding-top: 60px;
        }
        .modal-content {
            background-color: #fefefe;
            margin: 5% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
        }
    </style>
</head>
<body>
    <div id='calendar'></div>

    <div id="event-modal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2 id="event-title"></h2>
            <p id="event-description"></p>
        </div>
    </div>

    <script>
        // Close the modal when clicking on the close button or outside the modal
        $('.close, .modal').on('click', function() {
            $('#event-modal').hide();
        });
    </script>
</body>
</html>
