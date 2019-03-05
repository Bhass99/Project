@extends('layout.layout')

@section('content')
<div id='calendar'></div>

@endsection

@section('extra-js')
<script>
    $(document).ready(function() {

  $('#calendar').fullCalendar({
    header: {
      left: 'prev,next,today',
      center: 'title',
      right: 'month,agendaWeek,agendaDay'
      }
  });
  
});

</script>
@endsection