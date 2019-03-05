@extends('layout.layout')

@section('content')
<div id='calendar'></div>

@endsection

@section('extra-js')
<script>
    $(function() {
        $('#calendar').fullCalendar({
        })
    });
</script>
@endsection