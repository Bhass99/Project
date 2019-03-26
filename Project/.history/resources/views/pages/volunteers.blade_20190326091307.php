@extends('layout.layout')

@section('content')

<div class="container">
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
    <div class="jumbotron">
        <h2 class="pb-2">Bekijk alle vrijwilligers</h2>
        <table class="table table-striped table-borderd table-hover">
            <thead class="thead">
                <tr class="warning">
                    <th>Naam</th>
                    <th>Achternaam</th>
                    <th>Begintijd</th>
                    <th>Eindtijd</th>
                    <th>Geaccepteerd</th>
                </tr>
            </thead>
            @foreach ($volunteers as $event)
                <tbody>
                    <tr>
                        <td>{{Auth::user()->name}}</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
            @endforeach
        </table>
    </div>
</div>

@endsection