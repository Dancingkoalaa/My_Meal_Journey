
@extends('layouts.app')
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.7/index.global.min.js'></script>
    <script>

      document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
          navLinks: true,
          navLinkDayClick: function() {
            window.location.href = "/meals/create";
          },
          headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay'
            },
          events: [
            @foreach($meals as $meal)
                {
                    title: '{{$meal->name}}',
                    start: '{{$meal->meal_date}} {{$meal->meal_time}}',
                    url : '{{ route('meals.edit', $meal->id) }}'
                },
            @endforeach
          ]
        });
        calendar.render();
      });

    </script>
  </head>
  @section('content')
    <div id='calendar'></div>
  @endsection
</html>