@extends('layout.layout')

@section('content')
<div class="container">
        <div id='calendar'></div>

</div>

@endsection

@section('extra-js')
<script>
$(document).ready(function() {

  $('#calendar').fullCalendar({
    themeSystem: 'bootstrap4',
    defaultView: 'month',
    header: {
      left: 'prev,next today',
      center: 'title',
      right: 'month,agendaWeek,agendaDay,listMonth'
    },
    weekNumbers: true,
    eventLimit: true,
    events: 'https://fullcalendar.io/demo-events.json'
  });

});
  

</script>
@endsection