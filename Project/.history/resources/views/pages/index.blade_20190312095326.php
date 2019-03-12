@extends('layout.layout')

@section('content')
@if (count($errors) > 0)
  <div class="alert alert-danger">
    <p>{{$errors}}</p>
  </div>
    
@endif
@if (session('success'))
  <div class="alert alert-success" role="alert">
    <p>{{ session('success') }}</p>
  </div>
@endif
<div class="row"> 
  <a href="{{route('newDate')}}" class="btn btn-success"> Voeg event erbij</a>
  <a   href="{{route('displayEvents')}}" class="btn btn-primary"> wijzig event erbij</a>
  <a class="btn btn-danger"> verwijder event erbij</a>
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Large modal</button>

</div>
<div class="container">
  <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      
    </div>
  </div>
</div>
    {{-- <div id='calendar'></div> --}}
    {!! $calendar->calendar() !!}
    {!! $calendar->script() !!}
</div>
@endsection

@section('extra-js')
<script type="text/javascript" src="{{asset('js/calender.js')}}"></script>

@endsection