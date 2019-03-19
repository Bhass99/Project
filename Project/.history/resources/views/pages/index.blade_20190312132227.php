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
    <div class="row"> 
      <a   href="{{route('displayEvents')}}" class="btn btn-primary"> Wijzig/Verwijderen</a>
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Voeg een event bij</button>
    </div>
    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="card">
            <div class="card-body">
              <div class="card-title">
                  <h1>Voeg een datum bij</h1>
              </div>
              <form method="POST" action="{{route('saveDate')}}" >
                  @csrf
                  <div class="form-group">
                      <label>titel</label>
                      <input type="text" class="form-control" name="title" placeholder="title"/>
                  </div>
                  <div class="form-group">
                      <label>kleur</label>
                      <input type="color" class="form-control" name="color" placeholder="kleur"/>
                  </div>
                  <div class="form-group">
                      <label>Start datum</label>
                      <input type="datetime-local" class="form-control" name="start_date" placeholder="Start datum"/>
                  </div>
                  <div class="form-group">
                      <label>eind datum</label>
                      <input type="datetime-local" class="form-control" name="end_date" placeholder="Eind datum"/>
                  </div>
                  <button type="submit" class="btn btn-primary">verzenden</button>
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="calendar">
      {!! $calendar->calendar() !!}
      {!! $calendar->script() !!}
    </div>
    <div class="employee-need mt-3">
      <div class="jumbotron">
        <table class="table table-striped table-borderd table-hover">
          <thead class="thead">
            <h2>Op de volgende datums hebben we mensen nodig</h2>
            <tr class="warning">
              <th>Begin datum</th>
              <th>Eind datum</th>
            </tr>
              @foreach ($data as $event)
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