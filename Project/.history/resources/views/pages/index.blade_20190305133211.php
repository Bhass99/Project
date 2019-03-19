@extends('layout.layout')

@section('content')
<div class="row"> 
  <a href="{{route('newDate')}}" class="btn btn-success"> Voeg event erbij</a>
  <a  class="btn btn-success"> wijzig event erbij</a>
  <a class="btn btn-success"> verwijder event erbij</a>
  
</div>
<div class="container">
    {{-- <div id='calendar'></div> --}}
    {!! $calendar->calendar() !!}
    {!! $calendar->script() !!}
</div>
@endsection

@section('extra-js')
<script type="text/javascript" src="{{asset('js/calender.js')}}"></script>

@endsection