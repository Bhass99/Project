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
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection