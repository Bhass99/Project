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
        <table class="table table-striped table-borderd table-hover">
            <thead class="thead">
                <tr class="warning">
                    <th>Id</th>
                    <th>Title</th>
                    <th>color</th>
                    <th>Begin</th>
                    <th>Eind</th>
                    <th>Wijzig</th>
                    <th>Verwijder</th>
                </tr>
            </thead>
            @foreach ($events as $event)
                <tbody>
                    <tr>
                        <td>{{ $event->id}}</td>
                        <td>{{ $event->title}}</td>
                        <td>{{ $event->color}}</td>
                        <td>{{ $event->start_date}}</td>
                        <td>{{ $event->end_date}}</td>
                        <td><a href="{{route('editDate', $event->id)}}" class="btn btn-success">
                            <i class="fas fa-edit">wijzig</i>
                        </a></td>
                        <td>
                            <form method="POST" action="{{route('deleteDate', $event->id)}}">
                                @csrf
                                {{ method_field('DELETE') }}
                                <button type="submit" class="btn btn-danger">Verwijder</button>         
                            </form>
                        </td>
                    </tr>
                </tbody>
            @endforeach
        </table>
    </div>
</div>

@endsection