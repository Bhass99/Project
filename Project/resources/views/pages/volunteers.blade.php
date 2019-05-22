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
        @if ($volunteers->count() > 0)
            <h2 class="pb-2">Bekijk alle vrijwilligers</h2>

        @else
            <h2 class="pb-2">Er zijn nog geen vrijwilligers!</h2>
        @endif
        <div style="overflow-x:auto;">

            <table class="table table-striped table-borderd table-hover">

                <thead class="thead">
                    <tr class="warning">
                        <th>Voornaam</th>
                        <th>Achternaam</th>
                        <th>Begintijd</th>
                        <th>Eindtijd</th>
                        <th>Accepteren/Weigeren</th>
                        <th>Geaccepteerd</th>
                        <th>Geweigerd</th>
                    </tr>
                </thead>
                @foreach ($volunteers as $vol)
                    <tbody>
                        <tr>
                            <td>
                                @if($vol->guest_id === null)
                                    {{$vol->users()->value('name')}}
                                @elseif($vol->user_id === null)
                                    {{$vol->guests()->value('name')}}
                                @endif
                            </td>
                            <td>    
                                @if($vol->guest_id === null)
                                    {{$vol->users()->value('last_name')}}
                                @elseif($vol->user_id === null)
                                    {{$vol->guests()->value('last_name')}}
                                @endif
                            </td>
                            <td>
                                {{$vol->events()->value('start_date')}}
                            </td>
                            <td>
                                {{$vol->events()->value('end_date')}}
                            </td>
                            <td>
                                @if ($vol->permission === null)
                                    <form method="POST" action="{{route('volunteer.update', $vol->id)}}">
                                        {{ method_field('PATCH') }}  
                                        @csrf
                                        <button style="all:unset;cursor:pointer" type="submit"> <i class="fas fa-check-square"></i> Accepteren</button>   
                                    </form> 
                                    <form method="POST" action="{{route('refuseUser', $vol->id)}}">
                                        @csrf
                                        {{ method_field('PATCH') }}
                                        <button style="all:unset; cursor:pointer" type="submit"><i class="far fa-trash-alt"></i></i> Weiger</button>         
                                    </form>
                                    
                                @else
                                    &nbsp;
                                @endif   
                            </td>
                            <td class="text-center">
                                @if ($vol->permission)
                                    <i class="fas fa-check-square">
                                @endif
                            </td>
                            <td class="text-center">
                                @if ($vol->permission === 0)
                                    <i class="fas fa-times"></i>
                                @endif
                            </td>
                        </tr>
                    </tbody>
                @endforeach
            </table>
            
        </div>
        <div class="d-flex" style="justify-content: center; align-items:center" >
            {{$volunteers->links()}}
        </div>
        <a href="{{route('events')}}" class="btn btn-secondary">terug</a>
    </div>
</div>

@endsection