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
    <div class="">
      <button type="button" class="btn btn-secondary ml-2 " data-toggle="modal" data-target=".bd-example-modal-lg">Kies een datum </button><br>
      <small >Kies een datum om te gaan werken</small>
    </div>
    @else
      @if (Auth::User()->role == 'admin')
        <div class="row "> 
          <button type="button" class="btn btn-secondary ml-2 " data-toggle="modal" data-target=".bd-example-modal-lg">Voeg een event bij</button>
          <a href="{{route('displayEvents')}}" class="btn btn-secondary ml-2"> Wijzig/Verwijderen</a>
        </div>
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