@extends('layout.layout')

@section('content')
@if (session()->has('success'))
    <div class="alert alert-success">
      <p></p>
    </div>
@endif
<div class="row"> 
  <a href="{{route('newDate')}}" class="btn btn-success"> Voeg event erbij</a>
  <a  class="btn btn-primary"> wijzig event erbij</a>
  <a class="btn btn-danger"> verwijder event erbij</a>
  
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