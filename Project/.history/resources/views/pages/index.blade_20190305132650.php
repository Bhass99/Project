@extends('layout.layout')

@section('content')
<div class="container">
    {{-- <div id='calendar'></div> --}}
    {!! $calendar->calendar() !!}
    {!! $calendar->script() !!}
</div>
<a href="" class="btn btn-succes"> Voeg event erbij</button>
@endsection

@section('extra-js')
<script type="text/javascript" src="{{asset('js/calender.js')}}"></script>

@endsection