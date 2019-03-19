@extends('layout.layout')

@section('content')
    <div class="container">
        <div class="row">
            @if(count($errors) > 0)
                @foreach($errors->all() as $error)
                    <br>
                    <div class="alert alert-danger">
                        <li> {{ $error  }}</li>
                    </div>
                @endforeach
            @endif
            <div class="col-md-8 col-md-offset-2">
                <div class="card card-default">
                    <div class="card-heading">
                        <h1>Voeg een datum bij</h1>
                    </div>
                    <form method="POST" action="{{route('updateDate')}}" >
                        @csrf
                        <div class="form-group">
                            <label>titel</label>
                            <input type="text" class="form-control" name="title" placeholder="title" value="{{$event->title}}"/>
                        </div>
                        <div class="form-group">
                            <label>kleur</label>
                            <input type="color" class="form-control" name="color" placeholder="kleur" value="{{$event->color}}"/>
                        </div>
                        <div class="form-group">
                            <label>Start datum</label>
                            <input type="datetime-local" class="form-control" name="start_date" placeholder="Start datum" value="{{$event->start_date}}"/>
                        </div>
                        <div class="form-group">
                            <label>eind datum</label>
                            <input type="datetime-local" class="form-control" name="end_date" placeholder="Eind datum" value="{{$event->end_date}}"/>
                        </div>
                        <button type="submit" class="btn btn-primary">Wijzigen</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection