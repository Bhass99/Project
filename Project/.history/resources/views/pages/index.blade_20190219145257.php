@extends('layout.layout')

@section('content')
<div id='calendar'></div>

@endsection

@section('extra-js')
<script>
    $(document).ready(function() {

  $('#calendar').fullCalendar({
    themeSystem: 'bootstrap4',
    header: {
      left: 'prev,next today',
      center: 'title',
      right: 'month,agendaWeek,agendaDay,listMonth'
    },
    weekNumbers: true,
    eventLimit: true, // allow "more" link when too many events
    events: 'https://fullcalendar.io/demo-events.json'
  });

});
  

</script>
@endsection