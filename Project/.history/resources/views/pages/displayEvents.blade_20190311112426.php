@extends('layout.layout')

@section('content')

<div class="container">
    <div class="jumbotron">
        <table class="table table-striped table-borderd table-hover">
            <thead class="thead">
                <tr class="warning">
                    <th>Id</th>
                    <th>Naam</th>
                    <th>Begin</th>
                    <th>Eind</th>
                    <th>Wijzig</th>
                    <th>Verwijder</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $event->id}}</td>
                    <td>{{ $event->title}}</td>
                    <td>{{ $event->start_date}}</td>
                    <td>{{ $event->end_date}}</td>
                </tr>

                <th>
                    <a href="{{route('editDate', $event->id)}}"></a>
                </th>
            </tbody>
        </table>
    </div>
</div>

@endsection