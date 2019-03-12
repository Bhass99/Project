@extends('layout.layout')

@section('content')
<div class="row"> 
  <a href="{{route('newDate')}}" class="btn btn-success"> Voeg event erbij</button>
  <a  class="btn btn-success"> wijzig event erbij</button>
  <a class="btn btn-success"> Voeg event erbij</button>
  
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