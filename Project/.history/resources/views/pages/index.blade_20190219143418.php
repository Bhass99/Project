@extends('layout.layout')

@section('content')

@endsection

@section('extra-js')
    <script>
$(function() {

  // page is now ready, initialize the calendar...

  $('#calendar').fullCalendar({
    // put your options and callbacks here
  })

});
    </script>
@endsection