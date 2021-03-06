@extends('layout.admin')

@section('admin-content')
    <div class="container">
        @if(count($errors) > 0)
        <br>
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                <li> {{ $error  }}</li>
            @endforeach
        </div>
        @endif
        <div class="card">
            <div class="card-body">
                <div class="card-heading">
                    <h1>Wijzig een datum bij</h1>
                </div>
                <form method="POST" action="{{route('updateDate', $event->id)}}" >
                    @csrf
                    {{ method_field('PATCH') }}
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
                    <a href="{{route('displayEvents')}}" class="btn btn-secondary">Terug</a>
                </form>
            </div>
        </div>
    </div>
@endsection