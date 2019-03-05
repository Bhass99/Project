@extends('layout.layout')

@section('content')
<div class="container">
    <div id='calendar'></div>
</div>

@endsection

@section('extra-js')
<script type="text/javascript" src="{{asset('js/calender')}}"></script>

@endsection