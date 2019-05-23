@extends('layout.layout')

@section('content')

@include('inc/header')

<section id="calendarSection">
  <div class="container mb-4" >
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
     @if (session('failed'))
      <div class="alert alert-danger" role="alert">
        <p>{{ session('failed') }}</p>
      </div>
    @endif
   
    
    @include('inc/popupsCalendar')
    <div class="row">
      <div class="col-lg-8">
        {!! $calendar->calendar() !!}
        {!! $calendar->script() !!}
        @guest
        <div class="mt-4">
          <a href="#login" type="button" class="btn btn-dark " >Kies een datum </a><br>
          <small class="text-muted">Kies een datum om te gaan werken</small>
        </div>
        @else
          @if (Auth::User()->role == 'admin')
            {{-- <div class=""> 
              <button type="button" class="btn btn-dark" data-toggle="modal" data-target=".bd-example-modal-lg">Voeg een event bij</button>
              <a href="{{route('displayEvents')}}" class="btn btn-dark ml-2"> Wijzig/Verwijderen</a>
              <a href="{{route('createEvents')}}" class="btn btn-dark ml-2">Admin panel</a>

            </div> --}}
          @else
            <div class="mt-4"> 
              <button type="button" class="btn btn-dark " data-toggle="modal" data-target=".workerChoose">Kies een datum </button><br>     
              <small class="text-muted">Kies een datum om te gaan werken</small>      
            </div>
            @endif
        @endguest
      </div>
      <div class="col-lg-4 mt-3 ">
        <div class="jumbotron">
          <table class="table table-striped table-borderd table-hover">
            <thead class="thead">
              <h2>Op de volgende data hebben we mensen nodig</h2>
              <tr class="warning">
                <th>Begin datum</th>
                <th>Eind datum</th>
              </tr>
                @foreach ($emplNeed as $event)
                  <tbody>
                      <tr>
                          <td>{{ $event->start_date}}</td>
                          <td>{{ $event->end_date}}</td>
                      </tr>
                  </tbody>
                @endforeach
            </thead>
          </table>
          {{$emplNeed->links()}}
          
        </div>
      </div>
    </div>
   
  </div>
</section>

@include('pages/contact')
@include('inc/footer')
@endsection



@section('extra-js')
<script type="text/javascript" src="{{asset('js/calender.js')}}"></script>
<script src='{{asset('fullcalendar/lang-all.js')}}'></script>


@endsection