@extends('layout.layout')

@section('content')
<section id="calendarSection">
  <div class="container" >
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
   
    @include('inc/popupsCalendar')
    <div class="row">
      <div class="col-lg-8">
        {!! $calendar->calendar() !!}
        {!! $calendar->script() !!}
      </div>
      <div class="col-lg-4 mt-3 ">
        <div class="jumbotron">
          <table class="table table-striped table-borderd table-hover">
            <thead class="thead">
              <h2>Op de volgende datums hebben we mensen nodig</h2>
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
    @guest
    <div>
      <a href="{{route('login')}}" type="button" class="btn btn-secondary " >Kies een datum </a><br>
      <small class="text-muted">Kies een datum om te gaan werken</small>
    </div>
    @else
      @if (Auth::User()->role == 'admin')
        <div> 
          <button type="button" class="btn btn-secondary ml-2 " data-toggle="modal" data-target=".bd-example-modal-lg">Voeg een event bij</button>
          <a href="{{route('displayEvents')}}" class="btn btn-secondary ml-2"> Wijzig/Verwijderen</a>
          <a href="{{route('displayVolunteers')}}" class="btn btn-secondary ml-2"> Bekijk wie er werken</a>
        </div>
      @else
        <button type="button" class="btn btn-secondary " data-toggle="modal" data-target=".workerChoose">Kies een datum </button><br>     
        <small class="text-muted">Kies een datum om te gaan werken</small>      
      @endif
    @endguest
  </div>
</section>
@endsection

@section('extra-js')
<script type="text/javascript" src="{{asset('js/calender.js')}}"></script>
 <script>
   var showModal = () =>{
      alert('hh')
   }
    
  </script>
@endsection