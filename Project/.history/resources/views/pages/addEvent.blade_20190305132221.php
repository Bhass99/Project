@extends('layout.layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Voeg een datum bij
                    </div>
                    <form method="POST" action="">
                        @csrf
                        <div class="form-group">
                            <label>titel</label>
                            <input type="text" class="form-control" naam="title" placeholder="title"/>
                        </div>
                        <div class="form-group">
                            <label>kleur</label>
                            <input type="text" class="form-control" naam="color" placeholder="kleur"/>
                        </div>
                        <div class="form-group">
                            <label>Start datum</label>
                            <input type="text" class="form-control" naam="start_date" placeholder="Start datum"/>
                        </div>
                        <div class="form-group">
                            <label>eind datum</label>
                            <input type="text" class="form-control" naam="end_date" placeholder="Eind datum"/>
                        </div>
                        <input type="submit" class="btn btn "/>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection