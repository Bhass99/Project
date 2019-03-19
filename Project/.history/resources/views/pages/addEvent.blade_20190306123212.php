@extends('layout.layout')

@section('content')
    <div class="container">
        <div class="row">
            @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <p>{{$errors}}</p>
                    </div>
            @endif
            <div class="col-md-8 col-md-offset-2">
                <div class="card card-default">
                    <div class="card-heading">
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
                            <input type="date" class="form-control" name="start_date" placeholder="Start datum"/>
                        </div>
                        <div class="form-group">
                            <label>eind datum</label>
                            <input type="date" class="form-control" name="end_date" placeholder="Eind datum"/>
                        </div>
                        <button type="submit" class="btn btn-primary">verzenden</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection