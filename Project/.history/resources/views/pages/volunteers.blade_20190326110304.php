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
                    <th>Voornaam</th>
                    <th>Achternaam</th>
                    <th>Begintijd</th>
                    <th>Eindtijd</th>
                    <th>Accepteren/Weigeren</th>
                    <th>Geaccepteerd</th>
                </tr>
            </thead>
            @foreach ($volunteers as $vol)
                <tbody>
                    <tr>
                        <td>{{$vol->users()->value('name')}}</td>
                        <td>{{$vol->users()->value('last_name')}}</td>
                        <td>
                            {{$vol->events()->value('start_date')}}
                        </td>
                        <td>
                            {{$vol->events()->value('end_date')}}
                        </td>
                        <td>
                            
                            <form method="POST" action="{{route('volunteer.edit', $vol->id)}}">
                                {{ method_field('PATCH') }}
                                
                                <button style="all:unset" type="submit"> <i class="fas fa-check-square"></i>Accepteren</button>   
                            </form> 
                             <form method="POST" action="{{route('volunteer.destroy', $vol->id)}}">
                                @csrf
                                {{ method_field('DELETE') }}
                                <button style="all:unset" type="submit"><i class="fas fa-edit"></i>Verwijder</button>         
                            </form>
                        </td>
                        <td>
                            &nbsp;
                        </td>
                    </tr>
                </tbody>
            @endforeach
        </table>
    </div>
</div>

@endsection